<?php

namespace Samsui;

class Factory implements FactoryInterface
{
    protected $objects;

    public function __construct()
    {
        $this->objects = new ObjectCollection();
    }

    public function define($name)
    {
        if (!isset($this->objects[$name])) {
            $this->objects[$name] = new Definition();
        }
        return $this->objects[$name];
    }

    public function build($name, $quantity = 1)
    {
        if (isset($this->objects[$name])) {
            $result = array();
            for ($i = 0; $i < $quantity; ++$i) {
                $result[] = $this->objects[$name]->build();
            }
            if ($quantity == 1) {
                $result = $result[0];
            }
            return $result;
        }
    }
}
