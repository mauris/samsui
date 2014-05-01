<?php namespace Samsui\Generator\Provider;

use \PHPUnit_Framework_TestCase;
use Samsui\Generator\Generator;

class LocaleTest extends PHPUnit_Framework_TestCase
{
    protected $generator;

    protected function setUp()
    {
        $this->generator = new Generator();
    }

    public function testFetchEmpty()
    {
        $provider = new Locale($this->generator);
        $this->assertNull($provider->fetch('non-exists'));
    }

    public function testFetchDeadEnd()
    {
        $provider = new Locale($this->generator);
        $provider->setLocale('en_SG');
        $this->assertNull($provider->fetch('telephone.deadend'));
    }

    public function testGetSetLocale()
    {
        $provider = new Locale($this->generator);
        $provider->setLocale('en_SG');
        $this->assertEquals('en_SG', $provider->getLocale());
    }
}
