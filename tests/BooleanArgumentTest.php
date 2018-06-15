<?php

namespace Tests;

use App\Arguments\BooleanArgument;

class BooleanArgumentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function should_get_false_value_if_false()
    {
        $booleanArgument = new BooleanArgument("f");
        $booleanArgument->setValue(false);

        $value = $booleanArgument->getValue();
        $this->assertFalse($value);
    }
}
