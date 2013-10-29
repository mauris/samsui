<?php

namespace Samsui;

use \PHPUnit_Framework_TestCase;

class ObjectCollectionTest extends PHPUnit_Framework_TestCase
{
    public function testGetSet()
    {
        $items = new ObjectCollection();
        $this->assertNull($items->get('test'));
        $items->set('test', 'call me maybe?');
        $this->assertEquals('call me maybe?', $items->get('test'));
    }
}
