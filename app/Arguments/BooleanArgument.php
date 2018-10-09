<?php

namespace App\Arguments;


use App\Arguments\Validators\BooleanValidator;

class BooleanArgument extends Argument
{
    const DEFAULT_VALUE = false;
    private $value;

    public function __construct($name)
    {
        $this->name = $name;
        $this->value = self::DEFAULT_VALUE;
    }

    /**
     * @return bool
     */
    public function getValue()
    {

        return $this->value;
    }

    protected function setValue($matches)
    {
        $validator = new BooleanValidator($this);
        $validator->validate($matches);
        $this->value = true;
    }


}
