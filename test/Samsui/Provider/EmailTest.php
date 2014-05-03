<?php namespace Samsui\Generator\Provider;

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
}
