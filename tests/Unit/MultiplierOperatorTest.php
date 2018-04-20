<?php

namespace tests\Unit;

use App\Operators\MultiplierOperator;
use PHPUnit\Framework\TestCase;

class MultiplierOperatorTest extends TestCase
{
    protected $subject;

    public function setUp()
    {
        $this->subject = new MultiplierOperator();
    }

    public function testMultOfTwoPositiveNumbers()
    {
        $actual = $this->subject->perform(2, 3);

        $this->assertEquals(6, $actual);
    }

    public function testHasSymbol()
    {
        $actual = $this->subject->symbol();

        $this->assertEquals('*', $actual);
    }
}
