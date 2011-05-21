<?php

namespace BrainFuck\Ook;

use BrainFuck;
class Tokenizer extends BrainFuck\Tokenizer
{
    protected $_tokenLength = 9;

    protected $_tokens = array(
        'POINTER_INC'   => 'Ook. Ook?',
        'POINTER_DEC'   => 'Ook? Ook.',
        'MEMORY_INC'    => 'Ook. Ook.',
        'MEMORY_DEC'    => 'Ook! Ook!',
        'OUT_CHAR'      => 'Ook! Ook.',
        'IN_CHAR'       => 'Ook. Ook!',
        'WHILE_START'   => 'Ook! Ook?',
        'WHILE_END'     => 'Ook? Ook!',
    );
}