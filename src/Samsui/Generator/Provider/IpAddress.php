<?php

namespace Samsui\Generator\Provider;

class IpAddress extends BaseProvider
{
    public function v4($ip1 = null, $ip2 = null, $ip3 = null, $ip4 = null)
    {
        if ($ip1 === null) {
            $ip1 = $this->generator->math->between(0, 255);
        }
        if ($ip2 === null) {
            $ip2 = $this->generator->math->between(0, 255);
        }
        if ($ip3 === null) {
            $ip3 = $this->generator->math->between(0, 255);
        }
        if ($ip4 === null) {
            $ip4 = $this->generator->math->between(0, 255);
        }
        return $ip1 . '.' . $ip2 . '.' . $ip3 . '.' . $ip4;
    }

    public function v6($ip1 = null, $ip2 = null, $ip3 = null, $ip4 = null, $ip5 = null, $ip6 = null, $ip7 = null, $ip8 = null)
    {
        if ($ip1 === null) {
            $ip1 = $this->generator->math->between(0, 65535);
        }
        if ($ip2 === null) {
            $ip2 = $this->generator->math->between(0, 65535);
        }
        if ($ip3 === null) {
            $ip3 = $this->generator->math->between(0, 65535);
        }
        if ($ip4 === null) {
            $ip4 = $this->generator->math->between(0, 65535);
        }
        if ($ip5 === null) {
            $ip5 = $this->generator->math->between(0, 65535);
        }
        if ($ip6 === null) {
            $ip6 = $this->generator->math->between(0, 65535);
        }
        if ($ip7 === null) {
            $ip7 = $this->generator->math->between(0, 65535);
        }
        if ($ip8 === null) {
            $ip8 = $this->generator->math->between(0, 65535);
        }
        return $ip1 . ':' . $ip2 . ':' . $ip3 . ':' . $ip4 . ':' . $ip5 . ':' . $ip6 . ':' . $ip7 . ':' . $ip8;
    }
}
