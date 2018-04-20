<?php

namespace tests\Unit;

use App\Interpreter;
use App\Operators\Operator;
use Mockery;
use PHPUnit\Framework\TestCase;

class InterpreterTest extends TestCase
{
    protected $subject;

    public function setUp()
    {
        $this->subject = new Interpreter();
    }

    public function testHasNoOperators()
    {
        $actual = $this->subject->getOperators();

        $this->assertEmpty($actual);
    }

    public function testHasOneOperator()
    {
        $mock = Mockery::mock(Operator::class);
        $mock->allows()->symbol()->andReturns('*');

        $this->subject->addOperators($mock);

        $actual = $this->subject->getOperators();

        $this->assertCount(1, $actual);
    }

    public function testReadSimpleSumOperation()
    {
        $actual = $this->subject->read('1 + 3');

        $this->assertCount(1, $actual);
    }

    public function testReadSimpleSubOperation()
    {
        $actual = $this->subject->read('1 - 3');

        $this->assertCount(1, $actual);
    }
}
