<?php

namespace BrainFuck;

class VirtualMachine
{
    protected $_memory = array();

    protected $_pointer = 0;

    public function __construct()
    {
    }

    public function movePointerLeft()
    {
        $this->_pointer--;
        return $this;
    }

    public function movePointerRight()
    {
        $this->_pointer++;
        return $this;
    }

    public function incrementCurrentCell()
    {
        $this->_initializeCell();
        $this->_memory[$this->_pointer]++;
        return $this;
    }

    public function decrementCurrentCell()
    {
        $this->_initializeCell();
        $this->_memory[$this->_pointer]--;
        return $this;
    }

    public function getCurrentCell()
    {
        return $this->_memory[$this->_pointer];
    }

    protected function _initializeCell()
    {
        if (!isset($this->_memory[$this->_pointer])) {
            $this->_memory[$this->_pointer] = 0;
        }
    }

    public function readInput()
    {
        $stdIn = fopen('php://stdin', 'r');
        $input = fgets($stdIn,1);
        $this->_memory[$this->_pointer] = ord($input);
        return $this;
    }

    public function writeOutput()
    {
        echo chr($this->_memory[$this->_pointer]);
        return $this;
    }
}