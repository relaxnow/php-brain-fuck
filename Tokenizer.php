<?php

namespace BrainFuck;

class Tokenizer
{
    protected $_tokenLength = 1;

    protected $_tokens = array(
        'POINTER_INC'   => '>',
        'POINTER_DEC'   => '<',
        'MEMORY_INC'    => '+',
        'MEMORY_DEC'    => '-',
        'OUT_CHAR'      => '.',
        'IN_CHAR'       => ',',
        'WHILE_START'   => '[',
        'WHILE_END'     => ']',
    );

    protected $_input;

    protected $_line;
    protected $_char;

    protected $_tokenBuffer = array();

    protected $_warnings = array();

    public function __construct()
    {
    }

    public function tokenize($input)
    {
        $this->_input = $input;
        $this->_char = 1;
        $this->_line = 1;
        $this->_tokenBuffer = array();
        $this->_warnings = array();

        while (strlen($this->_input) > 0) {
            $matched = false;
            if (!$matched) {
                $matched = $this->_matchTokens();
            }
            if (!$matched) {
                $matched = $this->_matchNewline();
            }
            if (!$matched) {
                $matched = $this->_matchWhitespace();
            }
            if (!$matched) {
                $this->_skipUnknownTokens();
            }
        }
        return $this->_tokenBuffer;
    }

    protected function _matchTokens()
    {
        foreach ($this->_tokens as $code => $token) {
            if (substr($this->_input, 0, $this->_tokenLength) === $token) {
                $this->debug("Matched token $code ($token)");
                $this->_input = substr($this->_input, $this->_tokenLength);
                $this->_tokenBuffer[] = new Token($code, $token, $this->_char, $this->_line);
                $this->_char += $this->_tokenLength;
                return true;
            }
        }
        return false;
    }

    protected function _matchNewline()
    {
        // CR + LF
        if (substr($this->_input, 0, 2) === "\r\n") {
            $this->debug("Matched Windows newline");
            $this->_input = substr($this->_input, 2);
            $this->_char = 1;
            $this->_line++;
            return true;
        }

        // CR or LF
        if (in_array(substr($this->_input, 0, 1), array("\n", "\r"))) {
            $this->debug("Matched newline");
            $this->_input = substr($this->_input, 1);
            $this->_char = 1;
            $this->_line++;
            return true;
        }
        return false;
    }

    protected function _matchWhitespace()
    {
        // TAB
        if (substr($this->_input, 0, 1) === "\t") {
            $this->debug("Matched tab");
            $this->_input = substr($this->_input, 1);
            $this->_char = 1;
            $this->_line++;
            return true;
        }

        // TAB
        if (substr($this->_input, 0, 1) === " ") {
            $this->debug("Matched space");
            $this->_input = substr($this->_input, 1);
            $this->_char = 1;
            $this->_line++;
            return true;
        }
        return false;
    }

    protected function _skipUnknownTokens()
    {
        $this->debug("Skipping unrecognized character " . substr($this->_input, 0, 1));
        $this->_warnings[] = "Skipping unrecognized character: " . substr($this->_input, 0, 1);
        $this->_input = substr($this->_input, 1);
        return true;
    }

    public function getWarnings()
    {
        return $this->_warnings;
    }

    public function debug($line)
    {
        //echo $line . PHP_EOL;
    }
}