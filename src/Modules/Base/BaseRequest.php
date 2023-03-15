<?php

namespace Shitutech\Fes\Modules\Base;

abstract class BaseRequest
{
    public abstract function getApiPath(): string;

    /**
     * @param bool $toJson
     * @return array|false|string
     */
    public function fetchBizData(bool $toJson = true)
    {
        $bizData = [];

        $clzProperties = get_object_vars($this);

        foreach ($clzProperties as $property => $propertyValue) {
            $bizData[$property] = $propertyValue;
        }

        return $toJson ? json_encode($bizData) : $bizData;
    }

    /**
     * @param string $name
     * @param $value
     * @return void
     */
    public function __set(string $name, $value)
    {
        if (property_exists($this, $name)) {
            $this->{$name} = $value;
        }
    }

}