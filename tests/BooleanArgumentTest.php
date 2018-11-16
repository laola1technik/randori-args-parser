<?php

namespace Tests;

use App\Arguments\BooleanArgument;
use InvalidArgumentException;

class BooleanArgumentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function should_get_false_value_if_false()
    {
        $booleanArgument = new BooleanArgument("f");
        $booleanArgument->parse("-x");

        $value = $booleanArgument->getValue();

        $this->assertFalse($value);
    }

    /**
     * @test
     */
    public function should_get_true_value_if_argument_is_present()
    {
        $booleanArgument = new BooleanArgument("f");
        $booleanArgument->parse("-f");

        $value = $booleanArgument->getValue();

        $this->assertTrue($value);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function should_fail_if_value_follows_name()
    {
        $booleanArgument = new BooleanArgument("f");
        $booleanArgument->parse("-f value");
    }
}
