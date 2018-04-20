<?php

namespace tests\Specs;

use AcceptanceTester;

class ExampleCest
{
    public function specExample(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('Hello world!');
    }
}
