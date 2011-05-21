<?php

namespace BrainFuck\Okke;

use BrainFuck;
class Tokenizer extends BrainFuck\Tokenizer
{
    protected $_tokenLength = 11;

    protected $_tokens = array(
        'INC_POINTER'   => 'Okke. Okke?',
        'DEC_POINTER'   => 'Okke? Okke.',
        'INC_MEMORY'    => 'Okke. Okke.',
        'DEC_MEMORY'    => 'Okke! Okke!',
        'OUT'           => 'Okke! Okke.',
        'IN'            => 'Okke. Okke!',
        'WHILE_START'   => 'Okke! Okke?',
        'WHILE_END'     => 'Okke? Okke!',
    );
}