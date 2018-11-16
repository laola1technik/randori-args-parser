<?php

namespace App\Arguments\Validators;

class StringValidator extends Validator
{
    protected function isValid($value)
    {
        $stringPattern = "/^\S+$/";
        return preg_match($stringPattern, $value);
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
        return "Value supplied for -{$this->argument->getName()} is not an string.";
    }
}