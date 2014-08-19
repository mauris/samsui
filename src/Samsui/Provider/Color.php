<?php namespace Samsui\Provider;

class Color extends BaseProvider
{
    const RGB = 'rgb';
    const RGBA = 'rgba';
    const CMYK = 'cmyk';

    public function random($type = 'rgb')
    {
        $math = $this->generator->math;

        $result = null;
        switch ($type) {
            case Color::RGB:
                $result = array($math->between(0, 255), $math->between(0, 255), $math->between(0, 255));
                break;
            case Color::RGBA:
                $result = array($math->between(0, 255), $math->between(0, 255), $math->between(0, 255), $math->between(0, 255));
                break;
            case Color::CMYK:
                $result = array($math->between(0, 100), $math->between(0, 100), $math->between(0, 100), $math->between(0, 100));
                break;
        }
        return $result;
    }
}
