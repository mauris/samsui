<?php

namespace Samsui;

use \PHPUnit_Framework_TestCase;

class WrapperTest extends PHPUnit_Framework_TestCase
{
    public function testProperties()
    {
        $wrapper = new Wrapper(
            array('name' => 'John Sim'),
            array()
        );

        $this->assertEquals('John Sim', $wrapper->name);
        $wrapper->name = 'Gummy Bear';
        $this->assertEquals('Gummy Bear', $wrapper->name);
        $this->assertTrue(isset($wrapper->name));
        unset($wrapper->name);
        $this->assertFalse(isset($wrapper->name));
    }
}
