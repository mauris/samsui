<?php

namespace Samsui;

use \PHPUnit_Framework_TestCase;

class DefinitionTest extends PHPUnit_Framework_TestCase
{
    public function testSequence()
    {
        $definition = new Definition();
        $definition->sequence('name')->sequence('number');

        $obj1 = $definition->build();
        $this->assertTrue(property_exists($obj1, 'name'));
        $this->assertTrue(property_exists($obj1, 'number'));
        $this->assertEquals(1, $obj1->name);
        $this->assertEquals(1, $obj1->number);

        for ($i = 2; $i < 10; ++$i) {
            $obj = $definition->build();
            $this->assertTrue(property_exists($obj, 'name'));
            $this->assertTrue(property_exists($obj, 'number'));
            $this->assertEquals($i, $obj->name);
            $this->assertEquals($i, $obj->number);
        }
    }
}
