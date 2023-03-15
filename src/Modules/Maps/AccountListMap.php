<?php

namespace Shitutech\Fes\Modules\Maps;

use Shitutech\Fes\Modules\Base\BaseObject;

class AccountListMap extends BaseObject
{
    /**
     * @var string 商户编号
     */
    protected $merchantNo = '';

    /**
     * @var string 账户名称
     */
    protected $accountName = '';

    /**
     * @var string 账户号
     */
    protected $accountNo = '';

    /**
     * @var string 支付通道1.众邦2.支付宝4.招商银行
     */
    protected $payPass = '';

    /**
     * @var string 账户类型【1.商户开户1服务商开户】
     */
    protected $accountType = '';

    /**
     * @var string 服务商编号
     */
    protected $providerNo = '';

    /**
     * @var string 服务商名称
     */
    protected $providerName = '';

    /**
     * @return string
     */
    public function getMerchantNo(): string
    {
        return $this->merchantNo;
    }

    /**
     * @return string
     */
    public function getAccountName(): string
    {
        return $this->accountName;
    }

    /**
     * @return string
     */
    public function getAccountNo(): string
    {
        return $this->accountNo;
    }

    /**
     * @return string
     */
    public function getPayPass(): string
    {
        return $this->payPass;
    }

    /**
     * @return string
     */
    public function getAccountType(): string
    {
        return $this->accountType;
    }

    /**
     * @return string
     */
    public function getProviderNo(): string
    {
        return $this->providerNo;
    }

    /**
     * @return string
     */
    public function getProviderName(): string
    {
        return $this->providerName;
    }

}