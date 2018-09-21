<?php

namespace App\Arguments;


class BooleanArgument implements Argument
{
    const DEFAULT_VALUE = false;
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
     * @return bool
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

        if ($this->hasValue($matches)) {
            throw new \InvalidArgumentException(
                "Value supplied for -{$this->name} argument."
            );
        }

        $this->value = true;
    }

    private function hasValue($matches)
    {
        $parameterNamePattern = "/^-[a-zA-Z]/";
        return isset($matches[2]) && !preg_match($parameterNamePattern, $matches[2]);
    }
}