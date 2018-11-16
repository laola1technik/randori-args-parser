<?php

namespace App\Arguments;

use App\Arguments\Validators\ValidatorFactory;

abstract class Argument
{
    protected $name;
    protected $value;
    protected $validator;
    const DEFAULT_VALUE = null;

    /**
     * BooleanArgument constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->value = $this::DEFAULT_VALUE;
        $this->validator = ValidatorFactory::create(get_class($this));
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function parse($commandLineArguments)
    {
        $nameAndValuePattern = "/.*?-({$this->name})\s*(\S+)?/";

        $argumentFound = preg_match($nameAndValuePattern, $commandLineArguments, $matches);
        if (!$argumentFound) {
            return;
        }

        $this->setValue($matches);
    }

    abstract protected function setValue($matches);
}