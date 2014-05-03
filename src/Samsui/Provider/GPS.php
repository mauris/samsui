<?php namespace Samsui\Generator\Provider;

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
        $data = json_decode(file_get_contents(__DIR__ . '/Resource/land-gps.json'), true);
        $area = $this->generator->math->randomArrayValue($data);
        $latitude = $this->generator->math->between($area['min'][0], $area['max'][0]);
        $longitude = $this->generator->math->between($area['min'][1], $area['max'][1]);
        return array(
            'latitude' => $latitude,
            'longitude' => $longitude
        );
    }
}
