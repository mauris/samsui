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
}
