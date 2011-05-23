<?php

/**
 * A Hello World example for the Okke language.
 * Taken from: http://stackoverflow.com/questions/483997/what-language-has-the-longest-hello-world-program
 *
 * Note that the Okke language works by bugging Okke until he does what you want him to do.
 * 
 * Commands:
 *  - Okke. Okke?
 *  Move the Memory Pointer to the next array cell.
 *
 *  - Okke? Okke.
 *  Move the Memory Pointer to the previous array cell.
 *
 *  - Okke. Okke.
 *  Increment the array cell pointed at by the Memory Pointer.
 *
 *  - Okke! Okke!
 *  Decrement the array cell pointed at by the Memory Pointer.
 *
 *  - Okke. Okke!
 *  Read a character from STDIN and put its ASCII value into the cell pointed at by the Memory Pointer.
 *
 *  - Okke! Okke.
 *  Print the character with ASCII value equal to the value in the cell pointed at by the Memory Pointer.
 *
 *  - Okke! Okke?
 *  Move to the command following the matching Okke? Okke! if the value in the cell pointed at by the Memory Pointer is zero.
 *  Note that Okke! Okke? and Okke? Okke! commands nest like pairs of parentheses, and matching pairs are defined
 *  in the same way as for parentheses.
 *
 *  - Okke? Okke!
 *  Move to the command following the matching Okke! Okke? if the value in the cell pointed at by the Memory Pointer is non-zero. 
 */

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