<?php

namespace BrainFuck;

class Interpreter
{
    /**
     *
     */
    protected $_parser;

    /**
     * @var VirtualMachine
     */
    protected $_virtualMachine;

    public function interpret($input)
    {
        $parseTree = $this->_getParser()->parse($input);
        $this->_executeTree($parseTree);
    }

    protected function _executeTree($parseTree)
    {
        $virtualMachine = $this->_getVirtualMachine();

        foreach ($parseTree as $branch) {
            switch ($branch->getCode()) {
                case 'WHILE':
                    while ($virtualMachine->getCurrentCell() !== 0) {
                        $this->_executeTree($branch->getBranches());
                    }
                    break;

                case 'POINTER_INC':
                    $virtualMachine->movePointerRight();
                    break;

                case 'POINTER_DEC':
                    $virtualMachine->movePointerLeft();
                    break;

                case 'MEMORY_INC':
                    $virtualMachine->incrementCurrentCell();
                    break;

                case 'MEMORY_DEC':
                    $virtualMachine->decrementCurrentCell();
                    break;

                case 'OUT_CHAR':
                    $virtualMachine->writeOutput();
                    break;

                case 'IN_CHAR':
                    $virtualMachine->readInput();
                    break;
                default:
                    throw new Exception("Unknown parse tree code '" . $branch->getCode() . "'");
            }
        }
    }

    public function setVirtualMachine($virtualMachine)
    {
        $this->_virtualMachine = $virtualMachine;
    }

    protected function _getVirtualMachine()
    {
        if ($this->_virtualMachine) {
            return $this->_virtualMachine;
        }

        $this->_virtualMachine = new VirtualMachine();
        return $this->_virtualMachine;
    }

    protected function _getParser()
    {
        if ($this->_parser) {
            return $this->_parser;
        }

        $this->_parser = new Parser(new Tokenizer());
        return $this->_parser;
    }

    public function setParser(Parser $parser)
    {
        $this->_parser = $parser;
    }
}