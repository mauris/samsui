<?php

namespace Samsui\Generator\Provider;

class Math implements ProviderInterface
{
    public function between($lower = null, $upper = null)
    {
        return mt_rand($lower ?: 0, $upper ?: PHP_INT_MAX);
    }

    public function randomNumber($digits, $upper = null)
    {
        return $this->between(
            pow(10, $digits - 1),
            $upper ?: pow(10, $digits) - 1
        );
    }

    public function randomDigit()
    {
        return $this->between(0, 9);
    }

    public function randomDigitNonZero()
    {
        return $this->randomNumber(1);
    }

    public function randomAlphabet()
    {
        return chr($this->between(97, 122));
    }
}
