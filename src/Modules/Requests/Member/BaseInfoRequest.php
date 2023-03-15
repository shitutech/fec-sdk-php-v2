<?php

namespace Shitutech\Fes\Modules\Requests\Member;

use Shitutech\Fes\Modules\Base\BaseRequest;

class BaseInfoRequest extends BaseRequest
{
    /**
     * @var string 系统会员 ID
     */
    protected $systemId = '';

    /**
     * @var string 支付通道（1:众邦 2:支付宝 4.招商银行 5.平安银行 6.南京银行）
     */
    protected $payPass = '';

    public function getApiPath(): string
    {
        return '/api/fec/v2/acct/query';
    }

    /**
     * @param string $systemId
     * @return BaseInfoRequest
     */
    public function setSystemId(string $systemId): BaseInfoRequest
    {
        $this->systemId = trim($systemId);
        return $this;
    }

    /**
     * @param string $payPass
     * @return BaseInfoRequest
     */
    public function setPayPass(string $payPass): BaseInfoRequest
    {
        $this->payPass = trim($payPass);
        return $this;
    }

}