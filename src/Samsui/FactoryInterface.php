<?php

namespace Samsui;

interface FactoryInterface
{
    public function define($name);

    public function build($name);
}
