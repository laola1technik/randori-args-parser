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
        $integerValue = (int)$value;

        $this->assertSame($integerValue, $matchedValue);
    }

    public function nameAndValue()
    {
        return [
            "zero" => ["name" => "j", "value" => "0"],
            "singleDigit" => ["name" => "j", "value" => "3"],
            "multiDigit" => ["name" => "p", "value" => "8080"],
            "bigNumber" => ["name" => "p", "value" => (string)PHP_INT_MAX],
            "negativeNumber" => ["name" => "p", "value" => "-1"],
            "startsWithWhitespace" => ["name" => "p", "value" => " 1"]
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
            "noValue" => ["name" => "p", "value" => ""],
            "whitespace" => ["name" => "p", "value" => " "],
        ];
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function shouldFailIfValueIsMissing()
    {
        $integerArgument = new IntegerArgument("p");

        $integerArgument->parse("-p");
        $integerArgument->getValue();
    }

    /**
     * @test
     */
    public function shouldReturnDefaultValueIfArgumentIsMissing()
    {
        $integerArgument = new IntegerArgument("p");

        $integerArgument->parse("any");

        $this->assertEquals(IntegerArgument::DEFAULT_VALUE, $integerArgument->getValue());
    }


}
