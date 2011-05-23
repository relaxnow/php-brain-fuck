<?php
/**
 * A Hello World example from the BrainFuck wikipedia page:
 * http://en.wikipedia.org/wiki/Brainfuck
 */

require 'Exception.php';
require 'Interpreter.php';
require 'Parser.php';
require 'Token.php';
require 'ParseToken.php';
require 'Tokenizer.php';
require 'VirtualMachine.php';

$helloWorld = "+++++ +++++             initialize counter (cell #0) to 10
[                       use loop to set the next four cells to 70/100/30/10
    > +++++ ++              add  7 to cell #1
    > +++++ +++++           add 10 to cell #2
    > +++                   add  3 to cell #3
    > +                     add  1 to cell #4
    <<<< -                  decrement counter (cell #0)
]
> ++ .                  print 'H'
> + .                   print 'e'
+++++ ++ .              print 'l'
.                       print 'l'
+++ .                   print 'o'
> ++ .                  print ' '
<< +++++ +++++ +++++ .  print 'W'
> .                     print 'o'
+++ .                   print 'r'
----- - .               print 'l'
----- --- .             print 'd'
> + .                   print '!'
> .                     print '\n'";

$interpreter = new BrainFuck\Interpreter();
$interpreter->interpret($helloWorld);