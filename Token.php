<?php

namespace BrainFuck;

class Token
{
    protected $_code;
    protected $_content;
    protected $_char;
    protected $_line;

    public function __construct($code, $content, $char, $line)
    {
        $this->_code = $code;
        $this->_content = $content;
        $this->_char = $char;
        $this->_line = $line;
    }

    public function getCode()
    {
        return $this->_code;
    }

    public function getLine()
    {
        return $this->_line;
    }

    public function getChar()
    {
        return $this->_char;
    }

    public function getContent()
    {
        return $this->_content;
    }
}