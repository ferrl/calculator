<?php

namespace tests\Unit;

use App\Calculator;
use App\Interpreter;
use App\Operators\Operator;
use App\Operators\SumOperator;
use App\Operators\SubOperator;
use App\Operators\ModOperator;
use Mockery;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    protected $subject;

    public function testSimpleOperation()
    {
        $operator = Mockery::mock(Operator::class);
        $operator->shouldReceive('perform')
            ->withArgs([1, 3])
            ->andReturn(4);

        $interpreter = Mockery::mock(Interpreter::class);
        $interpreter->shouldReceive('read')
            ->withArgs(['1 + 3'])
            ->andReturn([[$operator, [1, 3]]]);

        $calculator = new Calculator($interpreter);

        $actual = $calculator->run('1 + 3');

        $this->assertEquals(4, $actual);
    }

    public function testMultipleOperations()
    {
        $interpreter = new Interpreter();
        $interpreter->addOperators(new SumOperator());
        $interpreter->addOperators(new SubOperator());
        $interpreter->addOperators(new ModOperator());
        
        $calculator = new Calculator($interpreter);
        $actual = $calculator->run('1 - 3 + 9 - 5 + 2 + 4 % 3');
        
        $this->assertEquals(2, $actual);
    }
}
