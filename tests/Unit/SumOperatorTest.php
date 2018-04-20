<?php

namespace tests\Unit;

use App\Operators\SumOperator;
use PHPUnit\Framework\TestCase;

class SumOperatorTest extends TestCase
{
    protected $subject;

    public function setUp()
    {
        $this->subject = new SumOperator();
    }

    public function testSumOfTwoPositiveNumbers()
    {
        $actual = $this->subject->perform(1, 3);

        $this->assertEquals(4, $actual);
    }
}
