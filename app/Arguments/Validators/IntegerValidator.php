<?php

namespace App\Arguments\Validators;

class IntegerValidator extends Validatore
{
    protected function isValid($value)
    {
        $integerPattern = "/^-?\d+$/";
        return preg_match($integerPattern, $value);
    }

    protected function isCorrectArgumentFormat($matches)
    {
        return isset($matches[2]);
    }

    public function getArgumentException()
    {
        return "No value supplied for -{$this->argument->getName()} argument.";
    }

    protected function getValueFormatException()
    {
        return "Value supplied for -{$this->argument->getName()} is not an integer.";
    }
}