<?php

namespace Shitutech\Fes\Modules\Requests\Trade;

use Shitutech\Fes\Modules\Base\BaseRequest;

class OrderSubRequest extends BaseRequest
{
    /**
     * @var string 是否自定义流水号 【0.否1.是】
     */
    protected $isCustom = '';

    /**
     * @var string 子订单订单号
     */
    protected $orderNo = '';

    /**
     * @var string 自定义批次号 isCustom=1时必传
     */
    protected $batchOrderNo = '';

    protected const IGNORE_EMPTY_PROPERTIES = ['batchOrderNo',];

    public function getApiPath(): string
    {
        return '/api/fec/v2/order/query/detail';
    }

    /**
     * @param string $isCustom
     * @return OrderSubRequest
     */
    public function setIsCustom(string $isCustom): OrderSubRequest
    {
        $this->isCustom = trim($isCustom);
        return $this;
    }

    /**
     * @param string $orderNo
     * @return OrderSubRequest
     */
    public function setOrderNo(string $orderNo): OrderSubRequest
    {
        $this->orderNo = trim($orderNo);
        return $this;
    }

    /**
     * @param string $batchOrderNo
     * @return OrderSubRequest
     */
    public function setBatchOrderNo(string $batchOrderNo): OrderSubRequest
    {
        $this->batchOrderNo = trim($batchOrderNo);
        return $this;
    }

}