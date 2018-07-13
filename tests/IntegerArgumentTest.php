<?php

namespace Tests;

use App\Arguments\IntegerArgument;
use InvalidArgumentException;

class IntegerArgumentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider nameAndValue
     * @param $name
     * @param $value
     */
    public function should_get_integer_value($name, $value)
    {
        $integerArgument = new IntegerArgument($name);
        $integerArgument->parse("-{$name} {$value}");

        $matchedValue = $integerArgument->getValue();

        $this->assertSame($value, $matchedValue);
    }

    public function nameAndValue()
    {
        return [
            "zero" => ["name" => "j", "value" => 0],
            "singleDigit" => ["name" => "j", "value" => 3],
            "multiDigit" => ["name" => "p", "value" => 8080],
            "bigNumber" => ["name" => "p", "value" => PHP_INT_MAX],
            "negativeNumber" => ["name" => "p", "value" => -1],
        ];
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     * @dataProvider nameAndInvalidValue
     */
    public function shouldFailIfValueIsInvalid($name, $invalidValue)
    {
        $integerArgument = new IntegerArgument($name);
        $integerArgument->parse("-{$name} {$invalidValue}");
    }

    public function nameAndInvalidValue()
    {
        return [
            "singleLetter" => ["name" => "p", "value" => "b"]
        ];
    }


}
