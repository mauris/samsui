<?php namespace Samsui\Provider;

use Samsui\Resource\Fetcher;

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

    public function land()
    {
        $fetcher = new Fetcher();
        $data = $fetcher->fetch('gps.lists.landArea');
        $area = $this->generator->math->randomArrayValue($data);
        $latitude = $this->generator->math->between($area['min'][0], $area['max'][0]);
        $longitude = $this->generator->math->between($area['min'][1], $area['max'][1]);
        return array(
            'latitude' => $latitude,
            'longitude' => $longitude
        );
    }
}
