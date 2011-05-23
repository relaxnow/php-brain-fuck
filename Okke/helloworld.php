<?php

require './../Exception.php';
require './../Interpreter.php';
require './../Parser.php';
require './../Token.php';
require './../ParseToken.php';
require './../Tokenizer.php';
require './../VirtualMachine.php';

require 'Tokenizer.php';

$helloWorld = "#example that prints Hello World!
Okke. Okke? Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke.
Okke. Okke. Okke. Okke. Okke! Okke? Okke? Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke.
Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke? Okke! Okke! Okke? Okke! Okke? Okke.
Okke! Okke. Okke. Okke? Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke.
Okke. Okke. Okke! Okke? Okke? Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke?
Okke! Okke! Okke? Okke! Okke? Okke. Okke. Okke. Okke! Okke. Okke. Okke. Okke. Okke. Okke. Okke.
Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke! Okke. Okke! Okke. Okke. Okke. Okke. Okke.
Okke. Okke. Okke! Okke. Okke. Okke? Okke. Okke? Okke. Okke? Okke. Okke. Okke. Okke. Okke. Okke.
Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke! Okke? Okke? Okke. Okke. Okke.
Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke? Okke! Okke! Okke? Okke! Okke? Okke. Okke! Okke.
Okke. Okke? Okke. Okke? Okke. Okke? Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke.
Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke! Okke? Okke? Okke. Okke. Okke.
Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke. Okke.
Okke. Okke? Okke! Okke! Okke? Okke! Okke? Okke. Okke! Okke! Okke! Okke! Okke! Okke! Okke! Okke.
Okke? Okke. Okke? Okke. Okke? Okke. Okke? Okke. Okke! Okke. Okke. Okke. Okke. Okke. Okke. Okke.
Okke! Okke. Okke! Okke! Okke! Okke! Okke! Okke! Okke! Okke! Okke! Okke! Okke! Okke! Okke! Okke.
Okke! Okke! Okke! Okke! Okke! Okke! Okke! Okke! Okke! Okke! Okke! Okke! Okke! Okke! Okke! Okke!
Okke! Okke. Okke. Okke? Okke. Okke? Okke. Okke. Okke! Okke.";

$interpreter = new BrainFuck\Interpreter();
$interpreter->setParser(new BrainFuck\Parser(new BrainFuck\Okke\Tokenizer()));
$interpreter->interpret($helloWorld);