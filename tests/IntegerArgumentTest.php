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
        $integerArgument = new IntegerArgument("j");
        $expectedValue = 3;
        $integerArgument->parse("-p " . $expectedValue);

        $value = $integerArgument->getValue();

        $this->assertSame($expectedValue, $value);
    }
}
