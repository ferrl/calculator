<?php

namespace tests\Unit;

use App\Operators\SubOperator;
use PHPUnit\Framework\TestCase;

class SubOperatorTest extends TestCase
{
    protected $subject;

    public function setUp()
    {
        $this->subject = new SubOperator();
    }

    public function testSubOfTwoPositiveNumbers()
    {
        $actual = $this->subject->perform(1, 3);

        $this->assertEquals(-2, $actual);
    }
}
