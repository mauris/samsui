<?php

namespace Samsui\Generator\Provider;

class GPS extends BaseProvider
{
    public function latitude()
    {
        $latitude = $this->generator->math->between(-90000, 90000) / 1000;
        return $latitude;
    }

    public function longitude()
    {
        $longitude = $this->generator->math->between(-180000, 180000) / 1000;
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
