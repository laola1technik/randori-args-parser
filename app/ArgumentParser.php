<?php

namespace App;


class ArgumentParser
{
    private $scheme;

    public function __construct(Scheme $scheme)
    {
        $this->scheme = $scheme;
    }

    public function parse($commandLineArguments)
    {

    }

    public function get($name)
    {
        $argument = $this->scheme->get($name);
        return $argument->getValue();
    }
}