<?php

namespace Tests;


use App\Arguments\BooleanArgument;
use App\Scheme;

class SchemeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function should_return_only_argument_by_name()
    {
        $name = "b";
        $argument = new BooleanArgument($name);
        $scheme = new Scheme([$argument]);

        $returnedArgument = $scheme->get($name);

        $this->assertSame($argument, $returnedArgument);
    }
}
