<?php

namespace App\Arguments;


class BooleanArgument extends Argument
{
    const DEFAULT_VALUE = false;
    private $value;

    public function __construct($name)
    {
        $this->name = $name;
        $this->value = self::DEFAULT_VALUE;
    }

    /**
     * @return bool
     */
    public function getValue()
    {
        return $this->value;
    }

    protected function setValue($matches)
    {
        if (!$this->isCorrectArgumentFormat($matches)) {
            throw new \InvalidArgumentException(
                "Value supplied for -{$this->name} argument."
            );
        }

        $this->value = true;
    }

    private function isCorrectArgumentFormat($matches)
    {
        return !(isset($matches[2]) && !$this->isParameterName($matches));
    }

    private function isParameterName($matches)
    {
        return preg_match("/^-[a-zA-Z]/", $matches[2]);
    }
}
