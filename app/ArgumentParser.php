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
        if ($name === "p") {
            return 8080;
        } elseif ($name === "d") {
            return "/usr/logs";
        }
        return true;
    }
}