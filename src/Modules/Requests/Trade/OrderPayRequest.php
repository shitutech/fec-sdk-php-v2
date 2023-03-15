<?php

namespace Shitutech\Fes\Modules\Requests\Trade;

use Shitutech\Fes\FeConfig;
use Shitutech\Fes\Modules\Base\BaseRequest;
use Shitutech\Fes\Modules\Requests\Trade\Sub\OrderPayList;

class OrderPayRequest extends BaseRequest
{
    /**
     * @var string 服务商号
     */
    protected $providerNo = '';

    /**
     * @var string 账户类型【1.商户开户2.服务商开户】 对应账户和服务商关系
     */
    protected $accountType = '';

    /**
     * @var string 任务编号
     */
    protected $taskCode = '';

    /**
     * @var string 产品编号
     */
    protected $productCode = '';

    /**
     * @var string 手续费承担方 1:企业承担 2:客户承担
     */
    protected $costUndertaker = '';

    /**
     * @var string 支付通道（ 2:支付宝 4.招商银行 5.平安银行 6.南京银行）
     */
    protected $payPass = '';

    /**
     * @var string 是否自定义流水号 【0.不启用1.启用】
     */
    protected $isCustom = '';

    /**
     * @var string 批次号 格式：20200101-00001 当天日期+五位序列号 （isCustom=0时不为空）
     */
    protected $batchNumber = '';

    /**
     * @var string 不超过20位 自定义流水号 （isCustom=1时不为空）
     */
    protected $batchOrderNo = '';

    /**
     * @var string 是否使用默认绑定卡 （0 否1 是 ）【支付宝到户是传1】
     */
    protected $isDefaultCard = '';

    /**
     * @var array 支付信息 以下字段是list信息 数据格式[{“memberId”:”134814782XXX”,”name”:”李XX”,”idCard”:”2305231XXX”,”fee”:”10.00”}]
     */
    protected $payList = [];

    protected const IGNORE_EMPTY_PROPERTIES = ['batchNumber', 'batchOrderNo',];

    public function __construct()
    {
        $this->providerNo = FeConfig::getInstance()->getProviderNo();
        $this->taskCode = FeConfig::getInstance()->getTaskCode();
        $this->productCode = FeConfig::getInstance()->getProductNo();
    }

    public function getApiPath(): string
    {
        return '/api/fec/v2/order/pay';
    }

    /**
     * @param string $accountType
     * @return OrderPayRequest
     */
    public function setAccountType(string $accountType): OrderPayRequest
    {
        $this->accountType = trim($accountType);
        return $this;
    }

    /**
     * @param string $costUndertaker
     * @return OrderPayRequest
     */
    public function setCostUndertaker(string $costUndertaker): OrderPayRequest
    {
        $this->costUndertaker = trim($costUndertaker);
        return $this;
    }

    /**
     * @param string $payPass
     * @return OrderPayRequest
     */
    public function setPayPass(string $payPass): OrderPayRequest
    {
        $this->payPass = trim($payPass);
        return $this;
    }

    /**
     * @param string $isCustom
     * @return OrderPayRequest
     */
    public function setIsCustom(string $isCustom): OrderPayRequest
    {
        $this->isCustom = trim($isCustom);
        return $this;
    }

    /**
     * @param string $batchNumber
     * @return OrderPayRequest
     */
    public function setBatchNumber(string $batchNumber): OrderPayRequest
    {
        $this->batchNumber = trim($batchNumber);
        return $this;
    }

    /**
     * @param string $batchOrderNo
     * @return OrderPayRequest
     */
    public function setBatchOrderNo(string $batchOrderNo): OrderPayRequest
    {
        $this->batchOrderNo = trim($batchOrderNo);
        return $this;
    }

    /**
     * @param string $isDefaultCard
     * @return OrderPayRequest
     */
    public function setIsDefaultCard(string $isDefaultCard): OrderPayRequest
    {
        $this->isDefaultCard = trim($isDefaultCard);
        return $this;
    }

    /**
     * @param OrderPayList $objItem
     * @return $this
     */
    public function addPayList(OrderPayList $objItem): OrderPayRequest
    {
        $this->payList[] = $objItem->fetchBizData(false);

        return $this;
    }

}