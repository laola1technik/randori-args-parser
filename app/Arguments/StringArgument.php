<?php

namespace App\Arguments;


class StringArgument extends Argument
{
    const DEFAULT_VALUE = "";
    private $value;

    public function __construct($name)
    {
        $this->name = $name;
        $this->value = self::DEFAULT_VALUE;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    protected function setValue($matches)
    {
        if (!$this->isCorrectArgumentFormat($matches)) {
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

    private function isCorrectArgumentFormat($matches)
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