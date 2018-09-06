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
        $nameAndValuePattern = "/.*?-({$this->name})\s*(\S+)?/";

        $argumentFound = preg_match($nameAndValuePattern, $commandLineArguments, $matches);
        if (!$argumentFound) {
            $this->value = self::DEFAULT_VALUE;
            return;
        }

        if (!$this->hasValue($matches)) {
            throw new \InvalidArgumentException(
                "No value supplied for -{$this->name} argument."
            );
        }

        if(!$this->isValid($matches[2])) {
            throw new \InvalidArgumentException(
                "Value supplied for -{$this->name} is not an integer."
            );
        }

        $this->value = $this->getArgumentValue($matches[2]);
    }

    /**
     * @param $matches array
     * @return bool
     */
    private function hasValue($matches)
    {
        return isset($matches[2]);
    }

    private function getArgumentValue($value)
    {
        return (int)$value;
    }

    private function isValid($value)
    {
        return $this->isInteger($value);
    }

    /**
     * @param $value
     * @return Boolean
     */
    private function isInteger($value)
    {
        $integerPattern = "/^-?\d+$/";
        return preg_match($integerPattern, $value);
    }
}