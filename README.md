PHPBrainFuck
============


Overview
--------


Why?
----
Because I wanted to learn more about writing parsers / interpreters and my PM was named Okke,
which reminded me of the Ook! language.

Usage
-----
Note that this is a toy interpreter and has not optimizations.

Auto-matching of [ or JUMP_IF_ZERO
----------------------------------
If you use the \[ command but do not provide a \] then the interpreter will assume
that you meant to close it at the end of the file.
So the following is completely valid:
+++++++++++[-.

Installation
------------


Acknowledgements
----------------
Thanks to Okke Harsta, my PM @ the SURFconext project by SURFnet for inspiration.
Thanks to Martin Fowler for his book '[Domain Specific Languages](http://martinfowler.com/books.html#dsl)'.

License
-------
            DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE
                    Version 2, December 2004

 Copyright (C) 2004 Sam Hocevar
  14 rue de Plaisance, 75014 Paris, France
 Everyone is permitted to copy and distribute verbatim or modified
 copies of this license document, and changing it is allowed as long
 as the name is changed.

            DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE
   TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION

  0. You just DO WHAT THE FUCK YOU WANT TO.