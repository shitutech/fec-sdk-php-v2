<?php

namespace Shitutech\Fes\Modules\Requests\Member;

use Shitutech\Fes\Modules\Base\BaseRequest;

class BankListRequest extends BaseRequest
{
    /**
     * @var string 支付通道 1:众邦 2:支付宝 4.招商银行 5.平安银行 6.南京银行） (1/2必传)
     */
    protected $payPass = '';

    public function getApiPath(): string
    {
        return '/api/fec/v2/bank/list';
    }

    /**
     * @param string $payPass
     * @return BankListRequest
     */
    public function setPayPass(string $payPass): BankListRequest
    {
        $this->payPass = trim($payPass);
        return $this;
    }

}