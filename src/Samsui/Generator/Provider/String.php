<?php

namespace Samsui\Generator\Provider;

class String extends BaseProvider
{
    public function alphabet()
    {
        return chr($this->generator->math->between(97, 122));
    }
}
