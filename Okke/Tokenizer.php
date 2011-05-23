<?php

namespace BrainFuck\Okke;

use BrainFuck;
class Tokenizer extends BrainFuck\Tokenizer
{
    protected $_tokenLength = 11;

    protected $_tokens = array(
        'POINTER_INC'   => 'Okke. Okke?',
        'POINTER_DEC'   => 'Okke? Okke.',
        'MEMORY_INC'    => 'Okke. Okke.',
        'MEMORY_DEC'    => 'Okke! Okke!',
        'OUT_CHAR'      => 'Okke! Okke.',
        'IN_CHAR'       => 'Okke. Okke!',
        'WHILE_START'   => 'Okke! Okke?',
        'WHILE_END'     => 'Okke? Okke!',
    );
}