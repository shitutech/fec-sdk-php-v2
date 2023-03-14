<?php

namespace Shitutech\Fes;

use Shitutech\Fes\Exceptions\FeException;
use Shitutech\Fes\Modules\Base\BaseResponse;

class FeClientResponse
{
    /**
     * @var BaseResponse|null
     */
    protected $response = null;

    /**
     * @var string
     */
    protected $respData = '';

    /**
     * @param BaseResponse $response
     * @param string $respJsonData
     */
    public function __construct(BaseResponse $response, string $respJsonData)
    {
        $this->response = $response;
        $this->respData = $respJsonData;
    }

    /**
     * @return BaseResponse
     * @throws FeException
     */
    public function fetchResult(): BaseResponse
    {
        $respData = trim($this->respData);
        if (empty($respData)) {
            throw new FeException("响应数据为空");
        }

        $decodeData = json_decode($respData, true);
        if (!is_array($decodeData)) {
            throw new FeException("响应数据 JSON 解码失败");
        }

        if (!isset($decodeData['code'])) {
            throw new FeException("响应数据缺少状态码字段 code");
        }

        if ($decodeData['code'] != '200') {
            throw new FeException("响应报告发生异常。Err: {$decodeData['code']}::{$decodeData['message']}");
        }

        if (!isset($decodeData['result'])) {
            throw new FeException("响应数据缺少业务数据字段 result");
        }

        if (!is_array($decodeData['result']) || !$decodeData['result']) {
            throw new FeException("业务数据无效");
        }

        $resultData = $decodeData['result'];

        if (!$this->response->ignoreStatusCode()) {
            if (!isset($resultData['statusCode'])) {
                throw new FeException("业务数据缺少业务返回码字段 statusCode");
            }

            if ($resultData['statusCode'] != '1000') {
                throw new FeException("银行响应报告发生异常。Err: {$resultData['statusCode']}:::{$resultData['msg']}");
            }
        }

        $this->response->setProperty($resultData);

        return $this->response;
    }

    public function toArray(): array
    {
        return $this->response->toArray();
    }

    public function toJson()
    {
        return $this->response->toJSON();
    }
}