<?php

namespace Samsui\Generator\Provider;

use \PHPUnit_Framework_TestCase;
use Samsui\Generator\Generator;

class UrlTest extends PHPUnit_Framework_TestCase
{
    protected $generator;

    protected function setUp()
    {
        $this->generator = new Generator();
        $this->generator->registerProvider('math', new Math($this->generator));
    }

    public function testTLD()
    {
        $provider = new Url($this->generator);
        $tld = $provider->tld();
        $this->assertInternalType('string', $tld);
        $this->assertTrue(4 >= strlen($tld));
    }

    public function testCommonDomains()
    {
        $provider = new Url($this->generator);
        $name = $provider->commonDomains();
        $this->assertRegExp('/^[a-z\.]+$/i', $name);
    }
}
