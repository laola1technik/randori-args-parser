<?php

namespace App\Arguments\Validators;

use App\Arguments\StringArgument;

class StringValidator implements Validator
{
    private $argument;

    public function __construct(StringArgument $argument)
    {
        $this->argument = $argument;
    }

    public function validate($matches)
    {
        if (!isset($matches[2])) {
            throw new \InvalidArgumentException(
                "No value supplied for -{$this->argument->getName()} argument."
            );
        }

        if(!$this->isString($matches[2])) {
            throw new \InvalidArgumentException(
                "Value supplied for -{$this->argument->getName()} is not a string."
            );
        }

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