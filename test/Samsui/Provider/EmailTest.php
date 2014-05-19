<?php namespace Samsui\Provider;

use \PHPUnit_Framework_TestCase;
use Samsui\Generator\Generator;

class EmailTest extends PHPUnit_Framework_TestCase
{
    protected $generator;

    protected function setUp()
    {
        $this->generator = new Generator();
        $this->generator->registerProvider('math', new Math($this->generator));
    }

    public function testDomain()
    {
        $provider = new Email($this->generator);
        $this->assertRegExp('/^[a-z\-\.]+$/i', $provider->domain());
    }

    public function testAddress()
    {
        $provider = new Email($this->generator);
        $this->assertRegExp('/^[_a-z0-9-]+@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i', $provider->address());
    }
}
