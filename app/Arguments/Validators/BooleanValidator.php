<?php

namespace App\Arguments\Validators;

use App\Arguments\BooleanArgument;

class BooleanValidator implements Validator
{
    private $argument;

    public function __construct(BooleanArgument $argument)
    {
        $this->argument = $argument;
    }

    public function validate($matches)
    {
        if (isset($matches[2]) && !$this->isParameterName($matches)) {
            throw new \InvalidArgumentException(
                "Value supplied for -{$this->argument->getName()} argument."
            );
        }
    }

    private function isParameterName($matches)
    {
        return preg_match("/^-[a-zA-Z]/", $matches[2]);
    }
}