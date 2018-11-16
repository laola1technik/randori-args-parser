<?php

namespace App\Arguments\Validators;

use App\Arguments\BooleanArgument;
use App\Arguments\IntegerArgument;
use App\Arguments\StringArgument;

class ValidatorFactory
{
    public static function create($class)
    {
        $validatorByArgument = [
          BooleanArgument::class => BooleanValidator::class,
          IntegerArgument::class => IntegerValidator::class,
          StringArgument::class => StringValidator::class,
        ];
        return new $validatorByArgument[$class]();
    }
}
