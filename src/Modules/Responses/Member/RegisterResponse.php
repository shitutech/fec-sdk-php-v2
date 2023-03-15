<?php

namespace Shitutech\Fes\Modules\Responses\Member;

use Shitutech\Fes\Modules\Base\BaseResponse;

class RegisterResponse extends BaseResponse
{
    /**
     * @var string 商户会员ID
     */
    protected $memberId = '';

    /**
     * @var string 系统会员ID
     */
    protected $systemId = '';

    /**
     * @return string
     */
    public function getMemberId(): string
    {
        return $this->memberId;
    }

    /**
     * @return string
     */
    public function getSystemId(): string
    {
        return $this->systemId;
    }
}