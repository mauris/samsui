<?php

namespace Samsui\Generator\Provider;

class GPS extends BaseProvider
{
    public function latitude()
    {
        $latitude = $this->generator->math->between(-90000000, 90000000) / 1000000;
        return $latitude;
    }

    public function longitude()
    {
        $longitude = $this->generator->math->between(-180000000, 180000000) / 1000000;
        return $longitude;
    }

    public function latlon()
    {
        return array(
            'latitude' => $this->latitude(),
            'longitude' => $this->longitude()
        );
    }
}
