<?php

namespace Shitutech\Fes\Modules\Requests\Trade;

use Shitutech\Fes\Modules\Base\BaseRequest;

class OrderBatchRequest extends BaseRequest
{
    /**
     * @var string 是否自定义流水号 【0.否1.是】
     */
    protected $isCustom = '';

    /**
     * @var string 批次流水号 isCustom=0时必传
     */
    protected $batchOrderId = '';

    /**
     * @var string 自定义批次号 isCustom=1时必传
     */
    protected $batchOrderNo = '';

    protected const IGNORE_EMPTY_PROPERTIES = ['batchOrderId', 'batchOrderNo',];

    public function getApiPath(): string
    {
        return '/api/fec/v2/order/query/batch';
    }

    /**
     * @param string $isCustom
     * @return OrderBatchRequest
     */
    public function setIsCustom(string $isCustom): OrderBatchRequest
    {
        $this->isCustom = trim($isCustom);
        return $this;
    }

    /**
     * @param string $batchOrderId
     * @return OrderBatchRequest
     */
    public function setBatchOrderId(string $batchOrderId): OrderBatchRequest
    {
        $this->batchOrderId = trim($batchOrderId);
        return $this;
    }

    /**
     * @param string $batchOrderNo
     * @return OrderBatchRequest
     */
    public function setBatchOrderNo(string $batchOrderNo): OrderBatchRequest
    {
        $this->batchOrderNo = trim($batchOrderNo);
        return $this;
    }

}