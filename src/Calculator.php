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

    /**
     * Run a expression.
     *
     * @param string $expression
     * @return int|float|double
     * @throws Exceptions\OperatorNotFound
     */
    public function run($expression)
    {
        $result = 0;

        $operations = $this->interpreter->read($expression);
;

        foreach ($operations as $operation) {
            $operator = $operation[0];

            $operands = array_filter($operation[1], function ($a) {
                return ! is_null($a);
            });

            if (count($operands) > 1) {
                $result = call_user_func_array([$operator, 'perform'], $operands);
                continue;
            }

            array_unshift($operands, $result);

            $result = call_user_func_array([$operator, 'perform'], $operands);
        }

        return $result;
    }
}
