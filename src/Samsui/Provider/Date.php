<?php namespace Samsui\Provider;

use Carbon\Carbon;

class Date extends BaseProvider
{
    /**
     * @param string $duration
     */
    public function past($duration)
    {
        $lower = strtotime('-' . $duration);
        return Carbon::createFromTimestampUTC($this->generator->math->between($lower, time()));
    }

    public function between($start, $end)
    {
        $lower = strtotime($start);
        $upper = strtotime($end);
        return Carbon::createFromTimestampUTC($this->generator->math->between($lower, $upper));
    }

    public function interval($start, $end, $interval)
    {
        $result = array();

        $date = new Carbon($start);
        $endDate = new Carbon($end);
        while ($endDate->gt($date)) {
            $date->add($interval);
            $result[] = $date->copy();
        }

        return $result;
    }

    public function farFuture($years)
    {
        if ($years < 2) {
            throw new \InvalidArgumentException('farFuture() requires $year argument to be at least 2 years or more.');
        }
        $upper = strtotime('+' . ($years + 1) . ' years');
        $lower = strtotime('+' . ($years - 1) . ' years');
        return Carbon::createFromTimestampUTC($this->generator->math->between($lower, $upper));
    }
}
