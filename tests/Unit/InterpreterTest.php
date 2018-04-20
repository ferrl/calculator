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

    public function testReadSimpleOperation()
    {
        $actual = count($this->subject->read('1 + 3'));

        $this->assertEquals(1, $actual);
    }
}
