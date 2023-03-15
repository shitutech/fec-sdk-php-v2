<?php

namespace Shitutech\Fes\Modules\Maps;

use Shitutech\Fes\Modules\Base\BaseObject;

final class BindBankCardMap extends BaseObject
{
    /**
     * @var string 支付通道 （1.众邦银行2.支付宝4.招商银行 5.平安银行 6.南京银行）
     */
    protected $payPass = '';

    /**
     * @var string 是否通道默认提现卡【0否1是】
     */
    protected $izDefault = '';

    /**
     * @var string 开户行编号
     */
    protected $bankNo = '';

    /**
     * @var string 开户行
     */
    protected $bankName = '';

    /**
     * @var string 银行卡号
     */
    protected $cardNo = '';

    /**
     * @var string 银行预留手机号
     */
    protected $bankPhone = '';

    /**
     * @return string
     */
    public function getPayPass(): string
    {
        return $this->payPass;
    }

    /**
     * @return string
     */
    public function getIzDefault(): string
    {
        return $this->izDefault;
    }

    /**
     * @return string
     */
    public function getBankNo(): string
    {
        return $this->bankNo;
    }

    /**
     * @return string
     */
    public function getBankName(): string
    {
        return $this->bankName;
    }

    /**
     * @return string
     */
    public function getCardNo(): string
    {
        return $this->cardNo;
    }

    /**
     * @return string
     */
    public function getBankPhone(): string
    {
        return $this->bankPhone;
    }

}