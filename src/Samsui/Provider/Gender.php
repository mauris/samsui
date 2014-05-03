<?php namespace Samsui\Generator\Provider;

class Gender extends BaseProvider
{
    public function pick($list = array('M', 'F'))
    {
        $gender = $this->generator->math->randomArrayValue($list);
        return $gender;
    }

    public function birthRatio($list = array('M' => 51.45, 'F' => 48.54))
    {
        $gender = $this->generator->math->randomWeightedArray($list);
        return $gender;
    }
}
