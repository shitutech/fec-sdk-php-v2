<?php

namespace Shitutech\Fes\Modules\Requests\Trade;

use Shitutech\Fes\FeConfig;
use Shitutech\Fes\Modules\Base\BaseRequest;

class AccountListRequest extends BaseRequest
{
    /**
     * @var string 账户类型1商户开户2服务商开户
     */
    protected $accountType = '';

    /**
     * @var string 支付通道（1:众邦 2：支付宝 4.招商银行 5.平安银行 6.南京银行）
     */
    protected $payPass = '';

    /**
     * @var string 服务商编号
     */
    protected $providerNo = '';

    public function __construct()
    {
        $this->providerNo = FeConfig::getInstance()->getProviderNo();
    }

    public function getApiPath(): string
    {
        return '/api/fec/v2/acct/query/list';
    }

    /**
     * @param string $accountType
     * @return AccountListRequest
     */
    public function setAccountType(string $accountType): AccountListRequest
    {
        $this->accountType = trim($accountType);
        return $this;
    }

    /**
     * @param string $payPass
     * @return AccountListRequest
     */
    public function setPayPass(string $payPass): AccountListRequest
    {
        $this->payPass = trim($payPass);
        return $this;
    }

}