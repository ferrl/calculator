<?php

namespace tests\Unit;

use App\Operators\DividerOperator;
use PHPUnit\Framework\TestCase;

class DividerOperatorTest extends TestCase
{
    protected $subject;

    public function setUp()
    {
        $this->subject = new DividerOperator();
    }

    public function testDivOfTwoPositiveNumbers()
    {
        $actual = $this->subject->perform(3, 2);

        $this->assertEquals(1.5, $actual);
    }

    public function testHasSymbol()
    {
        $actual = $this->subject->symbol();

        $this->assertEquals('/', $actual);
    }
}
