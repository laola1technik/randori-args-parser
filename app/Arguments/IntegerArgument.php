<?php

namespace App\Arguments;


class IntegerArgument extends Argument
{
    const DEFAULT_VALUE = 0;
    private $value;

    public function __construct($name)
    {
        $this->name = $name;
        $this->value = self::DEFAULT_VALUE;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    protected function setValue($matches)
    {
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

    private function getArgumentValue($value)
    {
        return (int)$value;
    }

    private function hasValue($matches)
    {
        return isset($matches[2]);
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