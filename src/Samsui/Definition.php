<?php

namespace Samsui;

class Definition implements DefinitionInterface
{
    protected $sequence = 1;

    protected $sequences = array();

    protected $values = array();

    protected $methods = array();

    public function sequence($name)
    {
        $this->sequences[] = $name;
        return $this;
    }

    public function attr($name, $value)
    {
        if (!isset($this->values[$name])) {
            $this->values[$name] = $value;
        }
        return $this;
    }

    public function method($name, $closure)
    {
        if (is_callable($closure) && !isset($this->methods[$name])) {
            $this->methods[$name] = $closure;
        }
        return $this;
    }

    public function build()
    {
        $properties = array();

        foreach ($this->sequences as $name) {
            $properties[$name] = $this->sequence;
        }

        foreach ($this->values as $name => &$value) {
            $attrValue = $value;
            if ($value instanceof \Closure) {
                $attrValue = call_user_func($attrValue, $this->sequence);
            }
            $properties[$name] = $attrValue;
        }
        ++$this->sequence;

        return new Wrapper($properties, $this->methods);
    }
}
