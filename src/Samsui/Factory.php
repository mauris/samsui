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

    }

    public function build($name, $quantity = 1)
    {

    }
}
