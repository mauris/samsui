<?php

namespace Samsui\Generator\Provider;

use \PHPUnit_Framework_TestCase;
use Samsui\Generator\Generator;

class StringTest extends PHPUnit_Framework_TestCase
{
    protected $generator;

    protected function setUp()
    {
        $this->generator = new Generator();
        $this->generator->registerProvider('math', new Math($this->generator));
    }

    public function testAlphabet()
    {
        $provider = new String($this->generator);
        $char = $provider->alphabet();
        $this->assertInternalType('string', $char);
        $this->assertEquals(1, strlen($char));
        $this->assertTrue(ord($char) >= 97 && ord($char) <= 122);
    }

    public function testFormat()
    {
        $provider = new String($this->generator);
        $str = $provider->format('t??t');
        $this->assertInternalType('string', $str);
        $this->assertEquals(4, strlen($str));
        $this->assertEquals('t', substr($str, 0, 1));
        $this->assertNotEquals('??', substr($str, 1, 2));
        $this->assertEquals('t', substr($str, -1, 1));
    }

    public function testAlphanumeric()
    {
        $provider = new String($this->generator);
        $str = $provider->alphanumeric(4);
        $this->assertInternalType('string', $str);
        $this->assertEquals(4, strlen($str));
    }
}
