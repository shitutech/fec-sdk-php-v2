<?php

namespace Shitutech\Fes\Modules\Maps;

use Shitutech\Fes\Modules\Base\BaseObject;

class OrderPayFailureListMap extends BaseObject
{
    /**
     * @var string 系统会员ID
     */
    protected $systemId = '';

    /**
     * @var string 会员名称
     */
    protected $name = '';

    /**
     * @var string 身份证号
     */
    protected $idCard = '';

    /**
     * @var string 开户行编号
     */
    protected $bankNo = '';

    /**
     * @var string 开户行名称
     */
    protected $bankName = '';

    /**
     * @var string 结算卡号
     */
    protected $cardNo = '';

    /**
     * @var string 结算卡号银行预留手机号
     */
    protected $bankPhone = '';

    /**
     * @var string 支付宝号 payPass=2返回
     */
    protected $aliPayNo = '';

    /**
     * @var string 金额
     */
    protected $fee = '';

    /**
     * @var string 备注
     */
    protected $remark = '';

    /**
     * @return string
     */
    public function getSystemId(): string
    {
        return $this->systemId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getIdCard(): string
    {
        return $this->idCard;
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

    /**
     * @return string
     */
    public function getAliPayNo(): string
    {
        return $this->aliPayNo;
    }

    /**
     * @return string
     */
    public function getFee(): string
    {
        return $this->fee;
    }

    /**
     * @return string
     */
    public function getRemark(): string
    {
        return $this->remark;
    }

}