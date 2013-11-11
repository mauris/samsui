<?php

namespace Samsui\Generator\Provider;

class GPS extends BaseProvider
{
    public function latitude()
    {
        $latitude = $this->generator->math->between(-90, 90, 6);
        return $latitude;
    }

    public function longitude()
    {
        $longitude = $this->generator->math->between(-180, 180, 6);
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
