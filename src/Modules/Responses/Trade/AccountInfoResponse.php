<?php

namespace Shitutech\Fes\Modules\Responses\Trade;

use Shitutech\Fes\Modules\Base\BaseResponse;

class AccountInfoResponse extends BaseResponse
{
    /**
     * @var string 账户余额 单位元，精确到两位小数点 示例： 10.05元
     */
    protected $balance = '';

    /**
     * @var string 可用余额 单位元，精确到两位小数点 示例： 10.05元
     */
    protected $availableFee = '';

    /**
     * @var string 冻结金额 单位元，精确到两位小数点 示例： 10.05元
     */
    protected $frozenBalance = '';

    /**
     * @return string
     */
    public function getBalance(): string
    {
        return $this->balance;
    }

    /**
     * @return string
     */
    public function getAvailableFee(): string
    {
        return $this->availableFee;
    }

    /**
     * @return string
     */
    public function getFrozenBalance(): string
    {
        return $this->frozenBalance;
    }

}