<?php namespace Samsui\Generator\Provider;

use Carbon\Carbon;

class Date extends BaseProvider
{
    public function past($duration)
    {
        $lower = strtotime('-' . $duration);
        return Carbon::createFromTimestampUTC($this->generator->math->between($lower, time()));
    }

    public function farFuture($years)
    {
        if ($years < 2) {
            throw new \InvalidArgumentException('farFuture() requires $year argument to be at least 2 years or more.');
        }
        $upper = strtotime('+' . ($years + 1) + ' years');
        $lower = strtotime('+' . ($years - 1) + ' years');
        return Carbon::createFromTimestampUTC($this->generator->math->between($lower, $upper));
    }
}
