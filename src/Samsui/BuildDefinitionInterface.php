<?php

namespace Samsui;

interface BuildDefinitionInterface
{
    public function sequence($name);

    public function attr($name, $value);
}
