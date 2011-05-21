<?php

namespace BrainFuck\Tests;

use BrainFuck;

class TokenizerTest extends PHPUnit_Framework_TestCase
{
    public function testEmpty()
    {
        $tokenizer = new BrainFuck\Tokenizer();
        $tokenStream = $tokenizer->tokenize("");
        $this->assertEmpty($tokenStream, "Tokenizing empty string");
    }

    public function testTokens()
    {
        $tokenizer = new BrainFuck\Tokenizer();
        $tokenStream1 = $tokenizer->tokenize("><+-.,[]");
    }

    public function testMultiLineTokens()
    {
        $tokenizer = new BrainFuck\Tokenizer();
        $tokenStream1 = $tokenizer->tokenize('>
        <
        +-
        .,
        []');
    }

    public function testIgnoreNonTokens()
    {
        $tokenizer = new BrainFuck\Tokenizer();
        $tokenStream1 = $tokenizer->tokenize('>
        <  ±!@#$%^&*()_}{":|?~§1234567890=\'\;/`
        +- qwertyuiopasdfghjklzxcvbnm
        .,
        []');
    }

    public function testMultiUse()
    {
        $tokenizer = new BrainFuck\Tokenizer();
        $tokenStream1 = $tokenizer->tokenize(">");

        $tokenizer = new BrainFuck\Tokenizer();
        $tokenStream2 = $tokenizer->tokenize("<");
    }
}