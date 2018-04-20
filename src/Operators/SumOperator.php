<?php

namespace App\Operators;

class SumOperator implements Operator
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

    /**
     * Operator math symbol.
     *
     * @return string
     */
    public function symbol()
    {
        return '+';
    }
}
