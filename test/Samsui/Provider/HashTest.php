<?php namespace Samsui\Provider;

use \PHPUnit_Framework_TestCase;
use Samsui\Generator\Generator;

class HashTest extends PHPUnit_Framework_TestCase
{
    protected $generator;

    protected function setUp()
    {
        $this->generator = new Generator();
        $this->generator->registerProvider('string', new String($this->generator));
        $this->generator->registerProvider('math', new Math($this->generator));
    }

    public function testHash()
    {
        $provider = new Hash($this->generator);
        $this->assertRegExp('/^[a-f0-9]{40}$/', $provider->hash('sha1'));
        $this->assertRegExp('/^[a-f0-9]{64}$/', $provider->hash('sha256'));
    }

    public function testSugarCall()
    {
        $provider = new Hash($this->generator);
        $this->assertRegExp('/^[a-f0-9]{40}$/', $provider->sha1());
        $this->assertRegExp('/^[a-f0-9]{64}$/', $provider->sha256());
    }
}
