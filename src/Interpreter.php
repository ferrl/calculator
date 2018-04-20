<?php

namespace App;

use App\Operators\Operator;
use App\Operators\SubOperator;
use App\Operators\SumOperator;

class Interpreter
{
    /**
     * @var Operator[]
     */
    public $operators = [];

    /**
     * Read an expression and return a list of commands to execute.
     *
     * @param string $expression
     * @return array
     */
    public function read($expression)
    {
        $commands = [];

        preg_match('/(\d+)(?:\s*)([\+\-\*\/])(?:\s*)(\d+)/', $expression, $matches);

        $operator = $matches[2];

        switch ($operator) {
            case '+':
                $commands[] = [new SumOperator, [$matches[1], $matches[3]]];
                break;
            case '-':
                $commands[] = [new SubOperator, [$matches[1], $matches[3]]];
                break;
            default:
                break;
        }

        return $commands;
    }

    /**
     * Get list of operators.
     *
     * @return Operator[]
     */
    public function getOperators()
    {
        return $this->operators;
    }
}
