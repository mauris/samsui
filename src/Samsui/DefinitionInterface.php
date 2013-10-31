<?php

namespace Samsui;

interface DefinitionInterface
{
    public function sequence($name);

    public function attr($name, $value);

    public function build();
}
