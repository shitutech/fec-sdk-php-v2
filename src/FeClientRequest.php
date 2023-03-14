<?php

namespace Shitutech\Fes;

use Shitutech\Fes\Exceptions\FeException;
use Shitutech\Fes\Helpers\UtilHelper;
use Shitutech\Fes\Modules\Base\BaseRequest;

final class FeClientRequest
{
    /**
     * @var BaseRequest|null
     */
    protected $request = null;

    /**
     * @var string
     */
    protected $userAgent = 'FeSdkV2/v1.0.0';

    /**
     * @var string
     */
    protected $contentType = 'application/json;charset=UTF-8';

    /**
     * @var float
     */
    protected $timeout = 15.0;

    public function __construct(BaseRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @param string $userAgent
     * @return FeClientRequest
     */
    public function setUserAgent(string $userAgent): FeClientRequest
    {
        $userAgent = trim($userAgent);
        if ($userAgent) {
            $this->userAgent .= " {$userAgent}";
        }

        return $this;
    }

    /**
     * @param string $contentType
     * @return FeClientRequest
     */
    public function setContentType(string $contentType): FeClientRequest
    {
        $contentType = trim($contentType);
        if ($contentType) {
            $this->contentType = $contentType;
        }

        return $this;
    }

    /**
     * @param float $timeout
     * @return FeClientRequest
     */
    public function setTimeout(float $timeout): FeClientRequest
    {
        $this->timeout = $timeout > 0 ? $timeout : 15.0;;
        return $this;
    }

    /**
     * @return string
     *
     * @throws FeException
     * @see https://showdoc.51wanquan.com/web/#/31/2083
     */
    public function send(): string
    {
        $domain = 'https://fec.51wanquan.com';

        $postData = $this->getBizParams();
        $dataJson = json_encode($postData);

        $ch = curl_init();

        $headers = [
            'Content-Type: ' . $this->contentType,
            'Content-Length: ' . strlen($dataJson),
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $domain . $this->request->getApiPath());
        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataJson);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);

        $data = curl_exec($ch);
        // $status = curl_getinfo($ch);
        $errNo = curl_errno($ch);
        $errMsg = curl_error($ch);
        curl_close($ch);

        if ($errNo) {
            throw new FeException("CURL 请求发生异常。Err: {$errNo}::{$errMsg}");
        }

        $data = trim($data);
        if (empty($data)) {
            throw new FeException("CURL 远程请求响应未返回任何数据");
        }

        return $data;
    }

    /**
     * @return array
     * @throws FeException
     */
    protected function getBizParams(): array
    {
        list($microseconds, $nowTime) = explode(' ', microtime());
        $microseconds = sprintf("%03d", $microseconds * 1000);

        $postData = [
            'requestTime' => date("YmdHis", $nowTime) . $microseconds,
            'nonce' => UtilHelper::randomStr(32),
            'merchantNo' => FeConfig::getInstance()->getMerchantNo(),
        ];

        $aesKey = UtilHelper::randomStr(24); // AES-128-ECB AES-192-ECB AES-256-ECB

        // 业务数据 AES 加密
        $bizData = $this->request->fetchBizData();
        $postData['requestData'] = openssl_encrypt($bizData, 'AES-192-ECB', $aesKey);
        if ($postData['requestData'] === false) {
            throw new FeException("业务数据 AES 加密失败！Err: " . openssl_error_string());
        }

        $postData['encryptKey'] = $this->fetchEncryptKey($aesKey);
        $postData['sign'] = $this->generateSign($postData);

        return $postData;
    }

    /**
     * AES 密钥加密
     *
     * @param string $aesKey
     * @return string
     * @throws FeException
     */
    protected function fetchEncryptKey(string $aesKey): string
    {
        $publicKeyReal = "-----BEGIN PUBLIC KEY-----\n";
        $publicKeyReal .= wordwrap(FeConfig::getInstance()->getSystemPublicKey(), 64, "\n", true);
        $publicKeyReal .= "\n-----END PUBLIC KEY-----";

        $keyRes = openssl_pkey_get_public($publicKeyReal);
        if ($keyRes === false) {
            throw new FeException("RSA 公钥无效！Err: " . openssl_error_string());
        }

        $encrypted = '';
        $chunkItems = str_split($aesKey, 200);

        foreach ($chunkItems as $chunk) {
            $partialEncrypted = '';
            $encryptionOk = openssl_public_encrypt($chunk, $partialEncrypted, $keyRes);

            if ($encryptionOk === false) {
                throw new FeException("RSA 公钥加密失败！Err: " . openssl_error_string());
            }

            $encrypted .= $partialEncrypted;
        }

        return base64_encode($encrypted);
    }

    /**
     * 按照requestTime + nonce + merchantNo + requestData + encryptKey的顺序将此拼接起来
     * 然后RSA商户秘钥（SHA1WithRSA）签名
     *
     * @param $signData
     * @return string
     * @throws FeException
     */
    protected function generateSign(&$signData): string
    {
        $signStr = "{$signData['requestTime']}{$signData['nonce']}{$signData['merchantNo']}" .
            "{$signData['requestData']}{$signData['encryptKey']}";

        $privateKeyReal = "-----BEGIN RSA PRIVATE KEY-----\n"; // pkcs1
        //$privateKeyReal = "-----BEGIN PRIVATE KEY-----\n"; // pkcs8
        $privateKeyReal .= wordwrap(FeConfig::getInstance()->getPrivateKey(), 64, "\n", true);
        $privateKeyReal .= "\n-----END RSA PRIVATE KEY-----";
        //$privateKeyReal .= "\n-----END PRIVATE KEY-----";

        $keyRes = openssl_pkey_get_private($privateKeyReal, '');
        if ($keyRes === false) {
            throw new FeException("RSA 私钥无效！Err: " . openssl_error_string());
        }

        if (!openssl_sign($signStr, $signature, $keyRes)) {
            throw new FeException("RSA 私钥签名失败！Err: " . openssl_error_string());
        }

        return base64_encode($signature);
    }

}