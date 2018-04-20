<?php

namespace App\Operators;

class SumOperator
{
    /**
     * Perform sum of two numbers.
     *
     * @param int|float|double $a
     * @param int|float|double $b
     * @return int|float|double
     */
    public function perform($a, $b)
    {
        return $a + $b;
    }
}
