<?php

namespace Shitutech\Fes\Modules\Requests\Member;

use Shitutech\Fes\Exceptions\FeException;
use Shitutech\Fes\Helpers\UtilHelper;

class BankCardRequest extends \Shitutech\Fes\Modules\Base\BaseRequest
{
    /**
     * @var string 系统会员 ID
     */
    protected $systemId = '';

    /**
     * @var string 支付通道（1:众邦 2:支付宝 4.招商银行 5.平安银行 6.南京银行）
     */
    protected $payPass = '';

    /**
     * @var string 开户行编号
     */
    protected $bankNo = '';

    /**
     * @var string 结算卡号
     */
    protected $cardNo = '';

    /**
     * @var string 银行预留手机号
     */
    protected $bankPhone = '';

    /**
     * @var string 银行卡照片 base64格式
     */
    protected $imgBank = '';

    protected const IGNORE_EMPTY_PROPERTIES = ['imgBank',];

    public function getApiPath(): string
    {
        return '/api/fec/v2/acct/update';
    }

    /**
     * @param string $systemId
     * @return BankCardRequest
     */
    public function setSystemId(string $systemId): BankCardRequest
    {
        $this->systemId = trim($systemId);
        return $this;
    }

    /**
     * @param string $payPass
     * @return BankCardRequest
     */
    public function setPayPass(string $payPass): BankCardRequest
    {
        $this->payPass = trim($payPass);
        return $this;
    }

    /**
     * @param string $bankNo
     * @return BankCardRequest
     */
    public function setBankNo(string $bankNo): BankCardRequest
    {
        $this->bankNo = trim($bankNo);
        return $this;
    }

    /**
     * @param string $cardNo
     * @return BankCardRequest
     */
    public function setCardNo(string $cardNo): BankCardRequest
    {
        $this->cardNo = trim($cardNo);
        return $this;
    }

    /**
     * @param string $bankPhone
     * @return BankCardRequest
     * @throws FeException
     */
    public function setBankPhone(string $bankPhone): BankCardRequest
    {
        $this->bankPhone = trim($bankPhone);

        UtilHelper::verifyMobile($this->bankPhone);

        return $this;
    }

    /**
     * @param string $imgBank
     * @return BankCardRequest
     */
    public function setImgBank(string $imgBank): BankCardRequest
    {
        $this->imgBank = trim($imgBank);
        return $this;
    }

}
