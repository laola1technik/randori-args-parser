<?php

namespace Tests;

use App\Arguments\StringArgument;
use InvalidArgumentException;

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

    /**
     * @test
     * @dataProvider nameAndValue
     * @param $name
     * @param $value
     */
    public function should_get_string_value($name, $value)
    {
        $stringArgument = new StringArgument($name);
        $stringArgument->parse("-{$name} {$value}");

        $matchedValue = $stringArgument->getValue();
        $expectedValue = trim($value);

        $this->assertSame($expectedValue, $matchedValue);
    }

    public function nameAndValue()
    {
        return [
            "directory" => ["name" => "d", "value" => "/usr/logs"],
            "digits" => ["name" => "d", "value" => "253454"],
            "date" => ["name" => "d", "value" => "1993-05-25"],
            "specialCharacters" => ["name" => "d", "value" => "&%?$!,.-_#+*~"],
            "name" => ["name" => "d", "value" => "matthias"],
            "singleCharacter" => ["name" => "d", "value" => "z"],
            "firstCharacterWhitespace" => ["name" => "d", "value" => " test"],
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
        $stringArgument = new StringArgument($name);
        $stringArgument->parse("-{$name} {$invalidValue}");
    }

    public function nameAndInvalidValue()
    {
        return [
            "noValue" => ["name" => "d", "value" => ""],
            "whitespace" => ["name" => "d", "value" => " "]
        ];
    }
}
