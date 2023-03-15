<?php

namespace Shitutech\Fes\Modules\Responses\Trade;

use Shitutech\Fes\Modules\Base\BaseResponse;
use Shitutech\Fes\Modules\Maps\OrderBatchPayListMap;

class OrderBatchResponse extends BaseResponse
{
    /**
     * @var string 批次流水号
     */
    protected $batchOrderId = '';

    /**
     * @var string 自定义流水号, 自定义时有值
     */
    protected $batchOrderNo = '';

    /**
     * @var string 商户号
     */
    protected $merchantNo = '';

    /**
     * @var string 服务商号
     */
    protected $providerNo = '';

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
     * @var string 业务类型
     */
    protected $busType = '';

    /**
     * @var string 支付通道
     */
    protected $payPass = '';

    /**
     * @var string 批次状态[0:已提交1:已接单2:已拒单3:发放中4:发放成功5:已撤销6:发放失败 7:发放部分成功]
     */
    protected $batchStatus = '';

    /**
     * @var array<OrderBatchPayListMap> 支付信息
     */
    protected $payList = [];

    protected const MAPPING = [
        'payList' => [OrderBatchPayListMap::class, self::MAPPING_MULTI],
    ];

    /**
     * @return string
     */
    public function getBatchOrderId(): string
    {
        return $this->batchOrderId;
    }

    /**
     * @return string
     */
    public function getBatchOrderNo(): string
    {
        return $this->batchOrderNo;
    }

    /**
     * @return string
     */
    public function getMerchantNo(): string
    {
        return $this->merchantNo;
    }

    /**
     * @return string
     */
    public function getProviderNo(): string
    {
        return $this->providerNo;
    }

    /**
     * @return string
     */
    public function getTaskCode(): string
    {
        return $this->taskCode;
    }

    /**
     * @return string
     */
    public function getProductCode(): string
    {
        return $this->productCode;
    }

    /**
     * @return string
     */
    public function getCostUndertaker(): string
    {
        return $this->costUndertaker;
    }

    /**
     * @return string
     */
    public function getBusType(): string
    {
        return $this->busType;
    }

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
    public function getBatchStatus(): string
    {
        return $this->batchStatus;
    }

    /**
     * @return OrderBatchPayListMap[]
     */
    public function getPayList(): array
    {
        return $this->payList;
    }

}