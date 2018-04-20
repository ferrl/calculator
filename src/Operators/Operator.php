<?php

namespace App\Operators;

interface Operator
{
    /**
     * Perform action in two numbers.
     *
     * @param int|float|double $a
     * @param int|float|double $b
     * @return int|float|double
     */
    public function perform($a, $b);
}
