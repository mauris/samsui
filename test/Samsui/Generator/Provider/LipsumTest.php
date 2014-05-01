<?php namespace Samsui\Generator\Provider;

use \PHPUnit_Framework_TestCase;
use Samsui\Generator\Generator;

class LipsumTest extends PHPUnit_Framework_TestCase
{
    protected $generator;

    protected function setUp()
    {
        $this->generator = new Generator();
        $this->generator->registerProvider('math', new Math($this->generator));
    }

    public function testWord()
    {
        $provider = new Lipsum($this->generator);
        $this->assertRegExp('/^[a-z]+$/', $provider->word());
    }

    public function testWords()
    {
        $provider = new Lipsum($this->generator);
        $this->assertRegExp('/^[a-z]+ [a-z]+ [a-z]+$/', $provider->words(3));
    }

    public function testSentence()
    {
        $provider = new Lipsum($this->generator);
        $this->assertRegExp('/^[A-Z]{1}[a-z ]+\.$/', $provider->sentence());
    }

    public function testSentence2()
    {
        $provider = new Lipsum($this->generator);
        $this->assertRegExp('/^[A-Z]{1}[a-z]+.*$/', $provider->sentence(3));
    }

    public function testParagraph()
    {
        $provider = new Lipsum($this->generator);
        $this->assertRegExp('/^([A-Z]{1}[a-z ]+\.(\s|\Z))+$/', $provider->paragraph());
        $this->assertRegExp('/^([A-Z]{1}[a-z ]+\.(\s|\Z))+$/', $provider->paragraph(3));
    }

    public function testParagraphs()
    {
        $provider = new Lipsum($this->generator);
        $this->assertRegExp('/^(([A-Z]{1}[a-z\. ]+)+(\n\n|\Z))+$/', $provider->paragraphs());
        $this->assertRegExp('/^(([A-Z]{1}[a-z\. ]+)+(\n\n|\Z))+$/', $provider->paragraphs(4));
    }
}
