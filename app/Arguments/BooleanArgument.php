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
        $this->value = self::DEFAULT_VALUE;
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
        return isset($matches[2]) && !$this->isParameterName($matches);
    }

    private function isParameterName($matches)
    {
        return preg_match("/^-[a-zA-Z]/", $matches[2]);
    }
}
