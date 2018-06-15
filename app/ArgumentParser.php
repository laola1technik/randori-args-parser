<?php

namespace App;


use App\Arguments\BooleanArgument;
use App\Arguments\IntegerArgument;

class ArgumentParser
{
    private $scheme;

    public function __construct(Scheme $scheme)
    {
        $this->scheme = $scheme;
    }

    public function parse($commandLineArguments)
    {
        foreach ($this->scheme->getArguments() as $argument) {
            if ($argument instanceof BooleanArgument) {
                $argument->setValue(strpos($commandLineArguments, "-l") !== -1);
            } elseif ($argument instanceof IntegerArgument) {
              $argument->setValue(strpos($commandLineArguments, "-p") !== -1 ? 8080 : 3);
            }

        }


    }

    public function get($name)
    {
        $argument = $this->scheme->get($name);
        return $argument->getValue();
    }
}