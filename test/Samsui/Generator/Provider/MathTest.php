<?php

namespace Samsui\Generator\Provider;

use \PHPUnit_Framework_TestCase;

class MathnTest extends PHPUnit_Framework_TestCase
{
    public function testBetween()
    {
        $provider = new Math();
        $number = $provider->between(1, 4);
        $this->assertInternalType('int', $number);
        $this->assertTrue($number >= 1 && $number <= 4);
    }

    public function testRandomNumber()
    {
        $provider = new Math();
        $number = $provider->randomNumber(8);
        $this->assertInternalType('int', $number);
        $this->assertEquals(8, strlen((string)$number));
    }
}
