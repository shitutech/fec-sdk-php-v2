<?php

namespace Shitutech\Fes\Modules\Responses\Member;

use Shitutech\Fes\Modules\Base\BaseResponse;
use Shitutech\Fes\Modules\Maps\BankListMap;

class BankListResponse extends BaseResponse
{
    /**
     * @var array 通道支持的银行列表
     */
    protected $bankList = [];

    protected const MAPPING = [
        'bankList' => [BankListMap::class, self::MAPPING_MULTI],
    ];

    /**
     * @return array
     */
    public function getBankList(): array
    {
        return $this->bankList;
    }

    public function ignoreStatusCode(): bool
    {
        return true;
    }

}