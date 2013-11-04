<?php

namespace Samsui\Generator\Provider;

use \PHPUnit_Framework_TestCase;

class MathnTest extends PHPUnit_Framework_TestCase
{
    public function testBetween()
    {
        $provider = new Math();
        $number = $provider->between(1, 5);
        $this->assertInternalType('int', $number);
        $this->assertTrue($number >= 1 && $number <= 5);
    }
}
