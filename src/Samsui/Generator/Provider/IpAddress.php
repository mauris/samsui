<?php namespace Samsui\Generator\Provider;

class IpAddress extends BaseProvider
{
    /**
     * @param integer $count
     * @param \Closure $generator
     * @param string $imploder
     */
    protected function process($count, $args, $generator, $imploder)
    {
        $result = array();
        for ($i = 0; $i < $count; ++$i) {
            if (isset($args[$i])) {
                $result[] = $args[$i];
            } else {
                $result[] = call_user_func($generator, $this->generator);
            }
        }
        return implode($imploder, $result);
    }

    public function v4()
    {
        return $this->process(4, func_get_args(), function ($g) {
            return $g->math->between(0, 255);
        }, '.');
    }

    public function v6()
    {
        return $this->process(8, func_get_args(), function ($g) {
            return $g->math->hex(($g->math->between(0, 65535)), 4);
        }, ':');
    }
}
