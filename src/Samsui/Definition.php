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
        $objData = array();

        foreach ($this->sequences as $name) {
            $objData[$name] = $this->sequence;
        }

        foreach ($this->values as $name => &$value) {
            $attrValue = $value;
            if ($value instanceof \Closure) {
                $attrValue = call_user_func($attrValue, $this->sequence);
            }
            $objData[$name] = $attrValue;
        }
        ++$this->sequence;

        return (object)$objData;
    }
}
