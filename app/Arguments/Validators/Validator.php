<?php

namespace App\Arguments\Validators;

use App\Arguments\Argument;

interface Validator
{
    public function validate(Argument $argument, $matches);
}