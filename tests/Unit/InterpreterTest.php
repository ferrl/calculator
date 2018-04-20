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
        $actual = count($this->subject->read('1 + 3'));

        $this->assertEquals(1, $actual);
    }

    public function testReadSimpleSubOperation()
    {
        $actual = count($this->subject->read('1 - 3'));

        $this->assertEquals(1, $actual);
    }
}
