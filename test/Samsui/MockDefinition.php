<?php

namespace Samsui;

class MockDefinition implements DefinitionInterface
{
    public function sequence($name)
    {
        return $this;
    }

    public function attr($name, $value)
    {
        return $this;
    }

    public function method($name, $closure)
    {
        return $this;
    }

    public function build()
    {
    }
}
