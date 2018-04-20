<?php

namespace tests\Unit;

use App\Operators\ModOperator;
use PHPUnit\Framework\TestCase;

class ModOperatorTest extends TestCase
{
    protected $subject;

    public function setUp()
    {
        $this->subject = new ModOperator();
    }

    public function testMultOfTwoPositiveNumbers()
    {
        $actual = $this->subject->perform(3, 2);

        $this->assertEquals(1, $actual);
    }

    public function testHasSymbol()
    {
        $actual = $this->subject->symbol();

        $this->assertEquals('%', $actual);
    }
}
