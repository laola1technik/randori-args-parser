<?php

namespace App\Arguments;

interface Argument
{
    /**
     * @return string
     */
    public function getName();

    public function getValue();

    public function parse($commandLineArguments);
}