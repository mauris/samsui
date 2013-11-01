<?php

namespace Samsui;

class Definition implements DefinitionInterface
{
    protected $sequences = array();

    protected $values = array();

    public function sequence($name)
    {
        if (!isset($this->sequences[$name])) {
            $this->sequences[$name] = 1;
        }
    }

    public function attr($name, $value)
    {
    }

    public function build()
    {
    }
}
