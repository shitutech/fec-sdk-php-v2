<?php

namespace Shitutech\Fes\Modules\Base;

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

}