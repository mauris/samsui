<?php namespace Samsui\Provider;

use Samsui\Resource\Fetcher;

class Lipsum extends BaseProvider
{
    private $words = array();

    public function word()
    {
        if (!$this->words) {
            $fetcher = new Fetcher();
            $this->words = $fetcher->fetch('lipsum.lists.words');
        }
        return $this->generator->math->randomArrayValue($this->words);
    }

    public function words($number)
    {
        $result = array();
        while ($number-- > 0) {
            $result[] = $this->word();
        }
        return implode(' ', $result);
    }

    /**
     * @param integer $numberOfWords
     */
    public function sentence($numberOfWords = null)
    {
        if (!$numberOfWords) {
            $numberOfWords = $this->generator->math->between(3, 12);
        }
        $words = $this->words($numberOfWords);
        return ucfirst($words) . '.';
    }

    /**
     * @param integer $numberOfSentence
     */
    public function paragraph($numberOfSentence = null)
    {
        if (!$numberOfSentence) {
            $numberOfSentence = $this->generator->math->between(1, 9);
        }
        $result = array();
        while ($numberOfSentence-- > 0) {
            $result[] = $this->sentence();
        }
        return implode(' ', $result);
    }

    /**
     * @param integer $numberOfParagraphs
     */
    public function paragraphs($numberOfParagraphs = null, $breakline = "\n\n")
    {
        if (!$numberOfParagraphs) {
            $numberOfParagraphs = $this->generator->math->between(2, 6);
        }
        $result = array();
        while ($numberOfParagraphs-- > 0) {
            $result[] = $this->paragraph();
        }
        return implode($breakline, $result);
    }
}
