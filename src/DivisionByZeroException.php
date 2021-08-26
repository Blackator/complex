<?php

namespace Blackator\Complex;

use Throwable;

class DivisionByZeroException extends \Exception
{
    public function __construct($message = "Division by zero", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}