<?php

namespace App\Http\Controllers\DateTime\OutputTypes;

use RuntimeException;
use Throwable;

final class ControllerOutputFactoryException extends RuntimeException
{

    public function __construct(?Throwable $previous = null)
    {
        parent::__construct('Unable to create an Output Type instance out of an unkown type', 0, $previous);
    }
}
