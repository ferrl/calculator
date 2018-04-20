<?php

namespace tests\Unit;

use App\Calculator;
use App\Interpreter;
use App\Operators\Operator;
use Mockery;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    protected $subject;

    public function setUp()
    {
        $operator = Mockery::mock(Operator::class);
        $operator->shouldReceive('perform')
            ->withArgs([1, 3])
            ->andReturn(4);

        $interpreter = Mockery::mock(Interpreter::class);
        $interpreter->shouldReceive('read')
            ->withArgs(['1 + 3'])
            ->andReturn([[$operator, [1, 3]]]);

        $this->subject = new Calculator($interpreter);
    }

    public function testSimpleOperation()
    {
        $actual = $this->subject->run('1 + 3');

        $this->assertEquals(4, $actual);
    }
}
