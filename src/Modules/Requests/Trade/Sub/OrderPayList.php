<?php

namespace Shitutech\Fes\Modules\Requests\Trade\Sub;

use Shitutech\Fes\Modules\Base\BaseReq;

class OrderPayList extends BaseReq
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
     * @var string 开户行编号 （isDefaultCard=0必传）
     */
    protected $bankNo = '';

    /**
     * @var string 开户行名称 （isDefaultCard=0必传）
     */
    protected $bankName = '';

    /**
     * @var string 结算卡号 （isDefaultCard=0必传）
     */
    protected $cardNo = '';

    /**
     * @var string 结算卡号银行预留手机号 （isDefaultCard=0必传）
     */
    protected $bankPhone = '';

    /**
     * @var string 支付宝号 发放到支付宝账号必传
     */
    protected $aliPayNo = '';

    /**
     * @var string 金额 单位元，精确到两位小数点 示例： 10.05元
     */
    protected $fee = '';

    protected const IGNORE_EMPTY_PROPERTIES = ['bankNo', 'bankName', 'cardNo', 'bankPhone', 'aliPayNo',];

    /**
     * @param string $systemId
     * @return OrderPayList
     */
    public function setSystemId(string $systemId): OrderPayList
    {
        $this->systemId = trim($systemId);
        return $this;
    }

    /**
     * @param string $name
     * @return OrderPayList
     */
    public function setName(string $name): OrderPayList
    {
        $this->name = trim($name);
        return $this;
    }

    /**
     * @param string $idCard
     * @return OrderPayList
     */
    public function setIdCard(string $idCard): OrderPayList
    {
        $this->idCard = trim($idCard);
        return $this;
    }

    /**
     * @param string $bankNo
     * @return OrderPayList
     */
    public function setBankNo(string $bankNo): OrderPayList
    {
        $this->bankNo = trim($bankNo);
        return $this;
    }

    /**
     * @param string $bankName
     * @return OrderPayList
     */
    public function setBankName(string $bankName): OrderPayList
    {
        $this->bankName = trim($bankName);
        return $this;
    }

    /**
     * @param string $cardNo
     * @return OrderPayList
     */
    public function setCardNo(string $cardNo): OrderPayList
    {
        $this->cardNo = trim($cardNo);
        return $this;
    }

    /**
     * @param string $bankPhone
     * @return OrderPayList
     */
    public function setBankPhone(string $bankPhone): OrderPayList
    {
        $this->bankPhone = trim($bankPhone);
        return $this;
    }

    /**
     * @param string $aliPayNo
     * @return OrderPayList
     */
    public function setAliPayNo(string $aliPayNo): OrderPayList
    {
        $this->aliPayNo = trim($aliPayNo);
        return $this;
    }

    /**
     * @param string $fee
     * @return OrderPayList
     */
    public function setFee(string $fee): OrderPayList
    {
        $this->fee = trim($fee);
        return $this;
    }

}