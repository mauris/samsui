<?php namespace Samsui\Provider;

class Age extends BaseProvider
{
    public function groups(array $range)
    {
        $ranges = func_get_args();
        $weight = array();
        foreach ($ranges as $range) {
            $weight[] = $range[1] - $range[0];
        }
        $index = $this->generator->math->randomWeightedArray($weight);
        $range = $ranges[$index];
        $age = $this->generator->math->between($range[0], $range[1]);
        return $age;
    }

    /**
     * @param integer $lower
     * @param integer $upper
     */
    public function between($lower, $upper)
    {
        $age = $this->generator->math->between($lower, $upper);
        return $age;
    }

    /**
     * @param integer $age
     */
    public function pick($age)
    {
        $age = $this->generator->math->randomArrayValue(func_get_args());
        return $age;
    }
}
