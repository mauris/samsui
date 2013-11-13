<?php

namespace Samsui\Generator\Provider;

use \PHPUnit_Framework_TestCase;
use Samsui\Generator\Generator;

class IpAddressTest extends PHPUnit_Framework_TestCase
{
    protected $generator;

    protected function setUp()
    {
        $this->generator = new Generator();
        $this->generator->registerProvider('math', new Math($this->generator));
    }

    public function testV4()
    {
        $provider = new IpAddress($this->generator);
        $ip = $provider->v4();
        $parts = explode('.', $ip);
        $this->assertCount(4, $parts);
        $this->assertRegExp('/^\d+$/', $parts[0]);
        $this->assertRegExp('/^\d+$/', $parts[1]);
        $this->assertRegExp('/^\d+$/', $parts[2]);
        $this->assertRegExp('/^\d+$/', $parts[3]);
    }

    public function testV42()
    {
        $provider = new IpAddress($this->generator);
        $ip = $provider->v4(192, 168);
        $parts = explode('.', $ip);
        $this->assertCount(4, $parts);
        $this->assertEquals(192, $parts[0]);
        $this->assertEquals(168, $parts[1]);
        $this->assertRegExp('/^\d+$/', $parts[2]);
        $this->assertRegExp('/^\d+$/', $parts[3]);
    }
}