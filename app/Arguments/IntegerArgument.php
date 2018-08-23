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
        if (!$argumentFound) {
            $this->value = self::DEFAULT_VALUE;
            return;
        }

        $this->value = $this->getArgumentValue($matches);
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

    private function getArgumentValue($matches)
    {
        if (!isset($matches[2])) {
            throw new \InvalidArgumentException(
                "No value supplied for -{$this->name} argument."
            );
        }
        $this->validateArgumentValue($matches[2]);

        return (int)$matches[2];
    }

    private function validateArgumentValue($argumentValue)
    {
        if (!$this->isInteger($argumentValue)) {
            throw new \InvalidArgumentException(
                "Value supplied for -{$this->name} is not an integer."
            );
        }
    }
}