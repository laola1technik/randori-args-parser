<?php

namespace Tests;

use App\Arguments\IntegerArgument;

class IntegerArgumentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function should_get_integer_value_3()
    {
        $integerArgument = new IntegerArgument("p");
        $expectedValue = 3;
        $integerArgument->parse("-p " . $expectedValue);

        $value = $integerArgument->getValue();

        $this->assertSame($expectedValue, $value);
    }

    /**
     * @test
     */
    public function should_get_integer_value_4()
    {
        $integerArgument = new IntegerArgument("p");
        $expectedValue = 4;
        $integerArgument->parse("-p " . $expectedValue);

        $value = $integerArgument->getValue();

        $this->assertSame($expectedValue, $value);
    }
}
