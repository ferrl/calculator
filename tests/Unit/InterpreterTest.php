<?php

namespace tests\Unit;

use App\Interpreter;
use PHPUnit\Framework\TestCase;

class InterpreterTest extends TestCase
{
    protected $subject;

    public function setUp()
    {
        $this->subject = new Interpreter();
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
