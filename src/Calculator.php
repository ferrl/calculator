<?php

namespace App;

class Calculator
{
    /**
     * @var Interpreter
     */
    protected $interpreter;

    /**
     * Calculator constructor.
     *
     * @param Interpreter $interpreter
     */
    public function __construct(Interpreter $interpreter)
    {
        $this->interpreter = $interpreter;
    }
}
