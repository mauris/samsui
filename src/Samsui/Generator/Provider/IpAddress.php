<?php namespace Samsui\Generator\Provider;

class IpAddress extends BaseProvider
{
    public function v4($ip1 = null, $ip2 = null, $ip3 = null, $ip4 = null)
    {
        $args = func_get_args();
        $result = array();
        for ($i = 0; $i < 4; ++$i) {
            if (isset($args[$i])) {
                $result[] = $args[$i];
            } else {
                $result[] = $this->generator->math->between(0, 255);
            }
        }
        return implode('.', $result);
    }

    public function v6($ip1 = null, $ip2 = null, $ip3 = null, $ip4 = null, $ip5 = null, $ip6 = null, $ip7 = null, $ip8 = null)
    {
        $math = $this->generator->math;
        if ($ip1 === null) {
            $ip1 = $math->hex(($math->between(0, 65535)), 4);
        }
        if ($ip2 === null) {
            $ip2 = $math->hex(($math->between(0, 65535)), 4);
        }
        if ($ip3 === null) {
            $ip3 = $math->hex(($math->between(0, 65535)), 4);
        }
        if ($ip4 === null) {
            $ip4 = $math->hex(($math->between(0, 65535)), 4);
        }
        if ($ip5 === null) {
            $ip5 = $math->hex(($math->between(0, 65535)), 4);
        }
        if ($ip6 === null) {
            $ip6 = $math->hex(($math->between(0, 65535)), 4);
        }
        if ($ip7 === null) {
            $ip7 = $math->hex(($math->between(0, 65535)), 4);
        }
        if ($ip8 === null) {
            $ip8 = $math->hex(($math->between(0, 65535)), 4);
        }
        return $ip1 . ':' . $ip2 . ':' . $ip3 . ':' . $ip4 . ':' . $ip5 . ':' . $ip6 . ':' . $ip7 . ':' . $ip8;
    }
}
