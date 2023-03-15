<?php

namespace Shitutech\Fes\Modules\Requests\Member;

use Shitutech\Fes\Modules\Base\BaseRequest;

class QueryBankCardRequest extends BaseRequest
{
    /**
     * @var string 会员系统ID
     */
    protected $systemId = '';

    public function getApiPath(): string
    {
        return '/api/fec/v2/bank/cards';
    }

    /**
     * @param string $systemId
     * @return QueryBankCardRequest
     */
    public function setSystemId(string $systemId): QueryBankCardRequest
    {
        $this->systemId = trim($systemId);
        return $this;
    }

}