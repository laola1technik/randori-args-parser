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
    /**
     * @test
     */
    public function shouldReturnDefaultValueIfArgumentIsMissing()
    {
        $stringArgument = new StringArgument("s");

        $stringArgument->parse("any");

        $this->assertEquals(StringArgument::DEFAULT_VALUE, $stringArgument->getValue());
    }
}
