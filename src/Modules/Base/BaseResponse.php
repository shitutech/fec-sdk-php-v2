<?php

namespace Shitutech\Fes\Modules\Base;

use Shitutech\Fes\FeConstant;

abstract class BaseResponse extends BaseObject
{
    /**
     * @var string 业务返回码
     */
    protected $statusCode = '';

    /**
     * 返回信息
     */
    protected $msg = '';

    /**
     * @return string
     */
    public function getStatusCode(): string
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getMsg(): string
    {
        return $this->msg;
    }

    /**
     * 忽略业务响应 statusCode 的校验
     *
     * @return bool
     */
    public function ignoreStatusCode(): bool
    {
        return false;
    }

    public function isSuccess(): bool
    {
        return $this->getStatusCode() == FeConstant::STATUS_CODE_SUCCESS;
    }

    public function isFailure(): bool
    {
        return $this->getStatusCode() == FeConstant::STATUS_CODE_FAILURE;
    }

}