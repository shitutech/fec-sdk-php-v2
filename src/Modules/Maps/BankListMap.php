<?php

namespace Shitutech\Fes\Modules\Maps;

use Shitutech\Fes\Modules\Base\BaseObject;

final class BankListMap extends BaseObject
{
    /**
     * @var string 银行名称
     */
    protected $title = '';

    /**
     * @var string 银行名称
     */
    protected $text = '';

    /**
     * @var string 银行编号
     */
    protected $value = '';

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

}