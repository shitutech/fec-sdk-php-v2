<?php

namespace Shitutech\Fes\Modules\Base;

abstract class BaseRequest extends BaseReq
{
    public abstract function getApiPath(): string;
}