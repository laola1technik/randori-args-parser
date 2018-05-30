<?php

namespace App;


class Scheme
{
    private $arguments;

    /* @param array */
    public function __construct($arguments)
    {
        $this->arguments = $arguments;
    }

    public function get($name)
    {
        foreach ($this->arguments as $argument) {
            if ($argument->getName() === $name) {
                return $argument;
            }
        }
    }
}