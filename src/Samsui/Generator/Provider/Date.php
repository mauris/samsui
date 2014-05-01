<?php namespace Samsui\Generator\Provider;

use Carbon\Carbon;

class Date extends BaseProvider
{
    public function past($duration)
    {
        $lower = strtotime('-' . $duration);
        return Carbon::createFromTimestampUTC($this->generator->math->between($lower, time()));
    }
}
