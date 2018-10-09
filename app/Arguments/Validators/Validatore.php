<?php

namespace App\Arguments\Validators;

use App\Arguments\Argument;

abstract class Validatore implements Validator
{
    protected $argumentException;
    protected $valueFormatException;
    /** @var Argument */
    protected $argument;

    public function validate(Argument $argument, $matches)
    {
        $this->argument = $argument;
        if (!$this->isCorrectArgumentFormat($matches)) {
            throw new \InvalidArgumentException(
                $this->getArgumentException()
            );
        }

        if (isset($matches[2]) && !$this->isValid($matches[2])) {
            throw new \InvalidArgumentException(
                $this->getValueFormatException()
            );
        }
    }

    abstract protected function isCorrectArgumentFormat($matches);
    abstract protected function getArgumentException();
    abstract protected function getValueFormatException();
    abstract protected function isValid($value);
}