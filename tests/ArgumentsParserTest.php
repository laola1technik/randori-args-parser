<?php

namespace tests;

class ArgumentsParserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function should_parse_arguments()
    {
        $commandLineArguments = '-l -p 8080 -d /usr/logs';
        $arguments = [
            new BooleanArgument("l"),
            new IntegerArgument("p"),
            new StringArgument("d")
        ];
        $scheme = new Scheme($arguments);
        $argumentParser = new ArgumentParser($scheme);

        $argumentParser->parse($commandLineArguments);

        $this->assertTrue($argumentParser->get("l"));
        $this->assertSame(8080, $argumentParser->get("p"));
        $this->assertSame("/usr/logs", $argumentParser->get("d"));
    }
}
