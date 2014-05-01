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
        $upper = strtotime('+' . $years + ' years');
        return Carbon::createFromTimestampUTC($this->generator->math->between(time(), $upper));
    }
}
