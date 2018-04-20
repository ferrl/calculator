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
        $mock->shouldReceive('symbol')->andReturns('+');

        $this->subject->addOperators($mock);

        $actual = $this->subject->getOperators();

        $this->assertCount(1, $actual);
    }

    public function testFindExistingOperator()
    {
        $mock = Mockery::mock(Operator::class);
        $mock->shouldReceive('symbol')->andReturns('+');

        $this->subject->addOperators($mock);

        $actual = $this->subject->findOperator('+');

        $this->assertNotNull($actual);
    }

    /**
     * @expectedException App\Exceptions\OperatorNotFound
     */
    public function testFailedToFindOperator()
    {
        $actual = $this->subject->findOperator('*');
    }

    public function testReadSimpleSumOperation()
    {
        $mock = Mockery::mock(Operator::class);
        $mock->shouldReceive('symbol')->andReturns('+');

        $this->subject->addOperators($mock);

        $actual = $this->subject->read('1 + 3');

        $this->assertCount(1, $actual);
    }

    public function testReadSimpleSubOperation()
    {
        $mock = Mockery::mock(Operator::class);
        $mock->shouldReceive('symbol')->andReturns('-');

        $this->subject->addOperators($mock);

        $actual = $this->subject->read('1 - 3');

        $this->assertCount(1, $actual);
    }

    public function testReadTwoOperations()
    {
        $mock1 = Mockery::mock(Operator::class);
        $mock1->shouldReceive('symbol')->andReturns('+');

        $mock2 = Mockery::mock(Operator::class);
        $mock2->shouldReceive('symbol')->andReturns('-');

        $this->subject->addOperators($mock1);
        $this->subject->addOperators($mock2);

        $actual = $this->subject->read('1 - 3 + 9');

        $this->assertCount(2, $actual);
    }
}
