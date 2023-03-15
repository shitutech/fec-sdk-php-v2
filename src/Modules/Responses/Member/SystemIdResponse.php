<?php

namespace Shitutech\Fes\Modules\Responses\Member;

use Shitutech\Fes\Modules\Base\BaseResponse;

class SystemIdResponse extends BaseResponse
{
    /**
     * @var string 系统会员ID
     */
    protected $systemId = '';

    /**
     * @return string
     */
    public function getSystemId(): string
    {
        return $this->systemId;
    }

}