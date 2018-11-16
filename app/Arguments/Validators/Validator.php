<?php

namespace App\Arguments\Validators;

use App\Arguments\Argument;

abstract class Validator
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

        if ($this->hasArgumentValue($matches) && !$this->isValid($matches[2])) {
            throw new \InvalidArgumentException(
                $this->getValueFormatException()
            );
        }
    }

    private function hasArgumentValue($matches)
    {
        return isset($matches[2]);
    }

    abstract protected function isCorrectArgumentFormat($matches);
    abstract protected function getArgumentException();
    abstract protected function isValid($value);
    abstract protected function getValueFormatException();
}