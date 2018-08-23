<?php

namespace App\Arguments;


class IntegerArgument implements Argument
{
    const DEFAULT_VALUE = 0;

    private $name;
    private $value;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    public function parse($commandLineArguments)
    {
        $nameAndValuePattern = "/.*?-({$this->name})\s*(\S+|-\d+)?/";

        $argumentFound = preg_match($nameAndValuePattern, $commandLineArguments, $matches);
        if ($argumentFound) {
            if (!$this->hasValue($matches)) {
                throw new \InvalidArgumentException(
                    "No value supplied for -{$this->name} argument."
                );
            }

            $argumentValue = $matches[2];
            if (!$this->isInteger($argumentValue)) {
                throw new \InvalidArgumentException(
                    "Value supplied for -{$this->name} is not an integer."
                );
            }
            $this->value = (int)$argumentValue;

        } else {
            $this->value = self::DEFAULT_VALUE;
        }
    }

    private function hasValue($matches)
    {
        return count($matches) === 3;
    }

    /**
     * @param $value
     * @return false|int
     */
    private function isInteger($value)
    {
        $integerPattern = "/^-?\d+$/";
        return preg_match($integerPattern, $value);
    }
}