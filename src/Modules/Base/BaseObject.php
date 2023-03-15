<?php

namespace Shitutech\Fes\Modules\Base;

abstract class BaseObject
{
    // 业务字段为数组时，进一步映射到类时的类型
    protected const MAPPING_MULTI = 1;
    protected const MAPPING_SINGLE = 2;

    /**
     * @param array $resultData
     * @return void
     */
    public function setProperty(array $resultData)
    {
        foreach ($resultData as $name => $value) {
            if (property_exists($this, $name)) {
                if (
                    defined('static::MAPPING') && static::MAPPING
                    && (static::MAPPING[$name] ?? [] && is_array($value))
                ) {
                    list($clz, $mapType) = static::MAPPING[$name];

                    if ($mapType == self::MAPPING_MULTI) {
                        if ($value) {
                            $tmpItems = [];

                            foreach ($value as $item) {
                                /**
                                 * @var  BaseObject $tmpClz
                                 */
                                $tmpClz = new $clz();
                                $tmpClz->setProperty($item);
                                $tmpItems[] = $tmpClz;
                            }

                            $this->{$name} = $tmpItems;
                        } else {
                            $this->{$name} = [];
                        }
                    } else {
                        /**
                         * @var  BaseObject $tmpClz
                         */
                        $tmpClz = new $clz();
                        $tmpClz->setProperty($item);
                        $this->{$name} = $tmpClz;
                    }

                    continue;
                }

                $pType = gettype($this->{$name});
                switch ($pType) {
                    case 'boolean':
                        $value = (boolean)$value;
                        break;
                    case 'array':
                        $value = (array)$value;
                        break;
                    case 'NULL':
                    case 'object':
                        break;
                    case 'integer':
                        $value = intval($value);
                        break;
                    case 'float':
                    case "double":
                        $value = floatval($value);
                        break;
                    case 'string':
                    default:
                        $value = $value === null ? '' : trim($value);
                        break;
                }

                $this->{$name} = $value;
            }
        }
    }

    public function toArray(): array
    {
        $bizData = [];

        $clzProperties = get_object_vars($this);

        foreach ($clzProperties as $property => $propertyValue) {
            if (is_object($propertyValue)) {
                /**
                 * @var BaseObject $propertyValue
                 */
                $bizData[$property] = $propertyValue->toArray();
            } elseif (is_array($propertyValue)) {
                $tmpItems = [];

                foreach ($propertyValue as $item) {
                    /**
                     * @var BaseObject $item
                     */
                    $tmpItems[] = $item->toArray();
                }

                $bizData[$property] = $tmpItems;
            } else {
                $bizData[$property] = $propertyValue;
            }
        }

        return $bizData;
    }

    public function toJson()
    {
        return json_encode($this->toArray());
    }
}