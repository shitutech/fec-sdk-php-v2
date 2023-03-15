<?php

namespace Shitutech\Fes\Modules\Responses\Member;

use Shitutech\Fes\Modules\Base\BaseResponse;
use Shitutech\Fes\Modules\Maps\BindBankCardMap;

class QueryBankCardResponse extends BaseResponse
{
    /**
     * @var array<BindBankCardMap> 绑卡列表
     */
    protected $memberCardList = [];

    protected const MAPPING = [
        'bankList' => [BindBankCardMap::class, self::MAPPING_MULTI],
    ];

    /**
     * @return array<BindBankCardMap>
     */
    public function getMemberCardList(): array
    {
        return $this->memberCardList;
    }

}