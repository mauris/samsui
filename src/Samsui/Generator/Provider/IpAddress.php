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
        $args = func_get_args();
        $result = array();
        for ($i = 0; $i < 8; ++$i) {
            if (isset($args[$i])) {
                $result[] = $args[$i];
            } else {
                $result[] = $this->generator->math->hex(($this->generator->math->between(0, 65535)), 4);
            }
        }
        return implode(':', $result);
    }
}
