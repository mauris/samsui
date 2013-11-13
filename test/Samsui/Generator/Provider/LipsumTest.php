<?php

namespace Samsui\Generator\Provider;

use \PHPUnit_Framework_TestCase;
use Samsui\Generator\Generator;

class LipsumTest extends PHPUnit_Framework_TestCase
{
    protected $generator;

    protected function setUp()
    {
        $this->generator = new Generator();
        $this->generator->registerProvider('math', new Math($this->generator));
    }

    public function testWord()
    {
        $provider = new Lipsum($this->generator);
        $this->assertRegExp('/^[a-z]+$/', $provider->word());
    }

    public function testWords()
    {
        $provider = new Lipsum($this->generator);
        $this->assertRegExp('/^[a-z]+ [a-z]+ [a-z]+$/', $provider->words(3));
    }

    public function testSentence()
    {
        $provider = new Lipsum($this->generator);
        $this->assertRegExp('/^[A-Z]{1}[a-z ]+\.$/', $provider->sentence());
    }
}
