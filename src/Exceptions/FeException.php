<?php

namespace Shitutech\Fes\Exceptions;

class FeException extends \Exception
{
    /**
     * {@inheritDoc}
     */
    public function __construct($message = '', $code = 1000, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}