<?php

namespace Shitutech\Fes\Modules\Responses\Trade;

use Shitutech\Fes\Modules\Base\BaseResponse;
use Shitutech\Fes\Modules\Maps\OrderPayFailureListMap;
use Shitutech\Fes\Modules\Maps\OrderPaySuccessListMap;

class OrderPayResponse extends BaseResponse
{
    /**
     * @var string 系统批次流水号
     */
    protected $batchOrderId = '';

    /**
     * @var string 自定义流水号
     */
    protected $batchOrderNo = '';

    /**
     * @var array<OrderPaySuccessListMap> 支付信息 （code=1001返回以下信息）
     */
    protected $payList = [];

    /**
     * @var array<OrderPayFailureListMap> 失败信息  （code=1002返回以下信息）
     */
    protected $failList = [];

    protected const MAPPING = [
        'payList' => [OrderPaySuccessListMap::class, self::MAPPING_MULTI],
        'failList' => [OrderPayFailureListMap::class, self::MAPPING_MULTI],
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
     * @return OrderPaySuccessListMap[]
     */
    public function getPayList(): array
    {
        return $this->payList;
    }

    /**
     * @return OrderPayFailureListMap[]
     */
    public function getFailList(): array
    {
        return $this->failList;
    }

}