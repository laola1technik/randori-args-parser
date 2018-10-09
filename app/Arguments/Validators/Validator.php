<?php

namespace App\Arguments\Validators;

interface Validator
{
    public function validate($matches);

}