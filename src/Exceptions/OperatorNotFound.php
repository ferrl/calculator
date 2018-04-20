<?php

namespace App\Exceptions;

use Exception;

class OperatorNotFound extends Exception
{
    /**
     * OperatorNotFound constructor.
     *
     * @param string $symbol
     * @param int $code
     * @param null $previous
     */
    public function __construct($symbol = "", $code = 0, $previous = null)
    {
        $message = 'Operator \'' .  $symbol . '\' not found';

        parent::__construct($message, $code, $previous);
    }
}
