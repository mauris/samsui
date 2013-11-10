<?php

namespace Samsui\Generator\Provider;

class GPS extends BaseProvider
{
    public function latitude()
    {
        $latitude = $this->generator->math->between(-90000, 90000) / 1000;
        return $latitude;
    }
}
