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
     * @param $name
     * @param $invalidValue
     */
    public function shouldFailIfValueIsInvalid($name, $invalidValue)
    {
        $integerArgument = new IntegerArgument($name);
        $integerArgument->parse("-{$name} {$invalidValue}");
    }

    public function nameAndInvalidValue()
    {
        return [
            "singleLetter" => ["name" => "p", "value" => "b"],
            "specialCharacter" => ["name" => "p", "value" => "♥"],
            "specialCharacter2" => ["name" => "p", "value" => "<2>"],
            "float" => ["name" => "p", "value" => "1.5"],
        ];
    }

    /**
     * @test
     */
    public function shouldGiveDefaultValueZeroIfNoValueSupplied()
    {
        $this->markTestIncomplete('Needs refactor');
        $integerArgument = new IntegerArgument("p");

        $integerArgument->parse("-p");
        $matchedValue = $integerArgument->getValue();

        $this->assertSame(0, $matchedValue);
    }


}
