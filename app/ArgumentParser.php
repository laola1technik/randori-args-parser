<?php

namespace App;


class ArgumentParser
{

    public function __construct(Scheme $scheme)
    {
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