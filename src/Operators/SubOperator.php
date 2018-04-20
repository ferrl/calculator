<?php

namespace App\Operators;

class SubOperator
{
    /**
     * Perform substraction of two numbers.
     *
     * @param int|float|double $a
     * @param int|float|double $b
     * @return int|float|double
     */
    public function perform($a, $b)
    {
        return $a - $b;
    }
}
