<?php namespace Samsui\Generator\Provider;

class String extends BaseProvider
{
    public function alphabet()
    {
        return chr($this->generator->math->between(97, 122));
    }

    public function format($format = '??????')
    {
        return preg_replace_callback('/\?/u', array($this, 'alphabet'), $format);
    }

    public function alphanumeric($length, $mixedCase = false)
    {
        $charset = $mixedCase
            ? 'abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            : 'abcdefghijklmnopqrstuvwxyz1234567890';
        $result = '';
        $charsetLength = strlen($charset);
        while ($length-- > 0) {
            $result .= substr($charset, $this->generator->math->between(0, $charsetLength - 1), 1);
        }
        return $result;
    }
}
