<?php

namespace Samsui;

class ObjectCollection
{
    protected $items = array();

    public function set($name, $object)
    {
        $this->items[$name] = $object;
    }

    public function get($name)
    {
        if (isset($this->items[$name])) {
            return $this->items[$name];
        }
    }
}
