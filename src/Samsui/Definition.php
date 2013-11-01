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
        if (!isset($this->values[$name])) {
            $this->values[$name] = $value;
        }
    }

    public function build()
    {
        $objData = array();

        foreach ($this->sequences as $name => &$value) {
            $objData[$name] = $value;
            ++$value;
        }

        foreach ($this->values as $name => &$value) {
            $attrValue = $value;
            if ($value instanceof \Closure) {
                $attrValue = call_user_func($attrValue);
            }
        }

        return (object)$objData;
    }
}
