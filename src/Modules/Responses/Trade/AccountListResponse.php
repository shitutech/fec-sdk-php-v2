<?php

namespace Shitutech\Fes\Modules\Responses\Trade;

use Shitutech\Fes\Modules\Base\BaseResponse;
use Shitutech\Fes\Modules\Maps\AccountListMap;

class AccountListResponse extends BaseResponse
{
    /**
     * @var array<AccountListMap> 商户账户列表
     */
    protected $payAccountList = [];

    protected const MAPPING = [
        'payAccountList' => [AccountListMap::class, self::MAPPING_MULTI],
    ];

    /**
     * @return AccountListMap[]
     */
    public function getPayAccountList(): array
    {
        return $this->payAccountList;
    }

}