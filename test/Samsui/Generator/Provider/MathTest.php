<?php

namespace Samsui\Generator\Provider;

use \PHPUnit_Framework_TestCase;

class MathTest extends PHPUnit_Framework_TestCase
{
    public function testBetween()
    {
        $provider = new Math($this->getMock('Samsui\\Generator\\GeneratorInterface'));
        $number = $provider->between(1, 4);
        $this->assertInternalType('int', $number);
        $this->assertTrue($number >= 1 && $number <= 4);
    }

    public function testBetweenInverted()
    {
        $provider = new Math($this->getMock('Samsui\\Generator\\GeneratorInterface'));
        $number = $provider->between(4, 1);
        $this->assertInternalType('int', $number);
        $this->assertTrue($number >= 1 && $number <= 4);
    }

    public function testBetweenSame()
    {
        $provider = new Math($this->getMock('Samsui\\Generator\\GeneratorInterface'));
        $number = $provider->between(4, 4);
        $this->assertInternalType('int', $number);
        $this->assertEquals(4, $number);
    }

    public function testRandomNumber()
    {
        $provider = new Math($this->getMock('Samsui\\Generator\\GeneratorInterface'));
        $number = $provider->randomNumber(8);
        $this->assertInternalType('int', $number);
        $this->assertEquals(8, strlen((string)$number));
    }

    public function testRandomDigit()
    {
        $provider = new Math($this->getMock('Samsui\\Generator\\GeneratorInterface'));
        $number = $provider->randomDigit();
        $this->assertInternalType('int', $number);
        $this->assertEquals(1, strlen((string)$number));
        $this->assertTrue($number >= 0 && $number <= 9);
    }

    public function testRandomDigitNonZero()
    {
        $provider = new Math($this->getMock('Samsui\\Generator\\GeneratorInterface'));
        $number = $provider->randomDigitNonZero();
        $this->assertInternalType('int', $number);
        $this->assertEquals(1, strlen((string)$number));
        $this->assertTrue($number >= 1 && $number <= 9);
    }

    public function testRandomArrayKey()
    {
        $provider = new Math($this->getMock('Samsui\\Generator\\GeneratorInterface'));
        $array = array('a', 'b', 'c');
        $key = $provider->randomArrayKey($array);
        $this->assertTrue(isset($array[$key]));
        $this->assertInternalType('int', $key);
    }

    public function testRandomArrayKeyNull()
    {
        $provider = new Math($this->getMock('Samsui\\Generator\\GeneratorInterface'));
        $array = array();
        $key = $provider->randomArrayKey($array);
        $this->assertNull($key);
    }

    public function testRandomArrayValue()
    {
        $provider = new Math($this->getMock('Samsui\\Generator\\GeneratorInterface'));
        $array = array('a', 'b', 'c');
        $value = $provider->randomArrayValue($array);
        $this->assertTrue(in_array($value, $array));
        $this->assertInternalType('string', $value);
    }

    public function testRandomWeightedArray()
    {
        $provider = new Math($this->getMock('Samsui\\Generator\\GeneratorInterface'));
        $array = array('a' => 2, 'b' => 10, 'c' => 5);
        $value = $provider->randomWeightedArray($array);
        $this->assertTrue(in_array($value, array_keys($array)));
        $this->assertInternalType('string', $value);
    }

    public function testRandomWeightedArrayEmpty()
    {
        $provider = new Math($this->getMock('Samsui\\Generator\\GeneratorInterface'));
        $array = array();
        $value = $provider->randomWeightedArray($array);
        $this->assertNull($value);
    }
}
