<?php

namespace Tests;

use App\Arguments\StringArgument;

class StringArgumentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function should_get_string_value_a()
    {
        $stringArgument = new StringArgument("s");
        $expectedValue = "a";
        $stringArgument->parse("-s " . $expectedValue);

        $value = $stringArgument->getValue();

        $this->assertSame($expectedValue, $value);
    }
}
