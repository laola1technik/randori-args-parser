<?php

namespace App\Arguments;


class StringArgument implements Argument
{
    const DEFAULT_VALUE = "";
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
     * @return string
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
                "Value supplied for -{$this->name} is not a string."
            );
        }

        $this->value = $this->getArgumentValue($matches[2]);
    }

    private function getArgumentValue($value)
    {
        return $value;
    }

    private function hasValue($matches)
    {
        return isset($matches[2]);
    }

    private function isValid($value)
    {
        return $this->isString($value);
    }

    /**
     * @param $value
     * @return Boolean
     */
    private function isString($value)
    {
        $stringPattern = "/^\S+$/";
        return preg_match($stringPattern, $value);
    }
}