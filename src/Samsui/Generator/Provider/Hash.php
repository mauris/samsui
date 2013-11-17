<?php

namespace Samsui\Generator\Provider;

class Hash extends BaseProvider
{
    public function hash($algorithm = 'sha256')
    {
        $base = $this->generator->math->between() . $this->generator->string->alphanumeric('20') . time();
        return hash($algorithm, $base);
    }
}
