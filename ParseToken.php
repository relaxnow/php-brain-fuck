<?php

namespace BrainFuck;

class ParseToken extends Token
{
    protected $_branches = array();

    public function setBranches(array $branches)
    {
        $this->_branches = $branches;
    }

    public function getBranches()
    {
        return $this->_branches;
    }
}