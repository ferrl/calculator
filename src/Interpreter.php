<?php

namespace App;

use App\Exceptions\OperatorNotFound;
use App\Operators\Operator;

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
     * @throws OperatorNotFound
     */
    public function read($expression)
    {
        $commands = [];
        $bag = [];

        $aux = $expression;

        while (preg_match('/(\d+)(?:\s*)([\+\-\*\/\%])(?:\s*)(.*)/', $aux, $matches)) {
            $bag[] = $matches[1];
            $bag[] = $matches[2];

            if (! array_key_exists(3, $matches)) {
                break;
            }

            $aux = $matches[3];
        }
        $bag[] = $aux;

        if (count($bag) < 3) {
            throw new \Exception("Moisés!!!", 1);
        }

        $operand1 = array_shift($bag);
        $operator = array_shift($bag);
        $operand2 = array_shift($bag);
        $commands[] = $this->operation($operator, $operand1, $operand2);

        $_bag = array_chunk($bag, 2);
        
        foreach ($_bag as $item) {
            $commands[] = $this->operation($item[0], $item[1]);
        }

        return $commands;
    }

    private function operation($operator, $a, $b = null)
    {
        return [
            $this->findOperator($operator), [$a, $b],
        ];
    }

    /**
     * Find operator by symbol.
     *
     * @param string $symbol
     * @return Operator
     * @throws OperatorNotFound
     */
    public function findOperator($symbol)
    {
        if (! array_key_exists($symbol, $this->getOperators())) {
            throw new OperatorNotFound($symbol);
        }

        return $this->getOperators()[$symbol];
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

    /**
     * Adds a new operator.
     *
     * @param Operator $operator
     */
    public function addOperators(Operator $operator)
    {
        $this->operators[$operator->symbol()] = $operator;
    }
}
