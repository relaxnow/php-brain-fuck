<?php
/**
 *
 */

require 'Exception.php';
require 'Interpreter.php';
require 'Parser.php';
require 'Token.php';
require 'ParseToken.php';
require 'Tokenizer.php';
require 'VirtualMachine.php';

$helloWorld = "++++++++++
[>+++++++>++++++++++>+++>+<<<<-] Initializing loop
>++.                             Print 'H'
>+.                              Print 'e'
+++++++.                         Print 'l'
.                                Print 'l'
+++.                             Print 'o'
>++.                             Print ' '
<<+++++++++++++++.               Print 'W'
>.                               Print 'o'
+++.                             Print 'r'
------.                          Print 'l'
--------.                        Print 'd'
>+.                              Print '!'
>.                               Print newline";

$interpreter = new BrainFuck\Interpreter();
$interpreter->interpret($helloWorld);

$mail = ">+++++++++[<+++++++++++++>-]<+.-------------.+++..-------.++++++++++++++.>++++++[<----------->-]<-.+.+++++++++++++++.>+++++[<++++++++>-]<+.++.--.>++++++[<---------->-]<+.>+++++++[<++++++++>-]<.+++.";

$interpreter = new BrainFuck\Interpreter();
$interpreter->interpret($mail);

$interpreter->interpret("+++++++>++++++++++[<++++++++++>]");