<?php

namespace App\Arguments\Validators;

class BooleanValidator extends Validatore
{
    protected function isValid($value)
    {
        return true;
    }

    protected function isCorrectArgumentFormat($matches)
    {
        return !(isset($matches[2]) && !$this->isParameterName($matches));
    }

    private function isParameterName($matches)
    {
        return preg_match("/^-[a-zA-Z]/", $matches[2]);
    }

    public function getArgumentException()
    {
        return "No value supplied for -{$this->argument->getName()} argument.";
    }

    protected function getValueFormatException()
    {
        return "Value supplied for -{$this->argument->getName()} is not an boolean.";
    }
}