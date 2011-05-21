<?php

namespace BrainFuck;

class Parser
{
    /**
     * @var Tokenizer
     */
    protected $_tokenizer;

    public function __construct($tokenizer)
    {
        $this->_tokenizer = $tokenizer;
    }

    public function parse($input)
    {
        $tokenStream = $this->_tokenizer->tokenize($input);
        return $this->_parseTokenStream($tokenStream);
    }

    protected function _parseTokenStream(array &$tokenStream, $scope = 0)
    {
        $parseTree = array();
        while ($token = array_shift($tokenStream)) {
            switch ($token->getCode()) {
                case 'WHILE_START':
                    $parseToken = $this->_getParseTokenFromToken($token);
                    $parseToken->setBranches($this->_parseTokenStream($tokenStream, $scope + 1));
                    break;

                case 'WHILE_END':
                    if ($scope <= 0) {
                        throw new Exception("Unexpected WHILE_END found on line " . $token->getLine() . ", character: " . $token->getChar());
                    }
                    else {
                        return $parseTree;
                    }

                default:
                    $parseToken = $this->_getParseTokenFromToken($token);
            }
            $parseTree[] = $parseToken;
        }
        return $parseTree;
    }

    protected function _getParseTokenFromToken(Token $token)
    {
        $code = $token->getCode();
        if ($code === "WHILE_START") {
            $code = "WHILE";
        }
        return new ParseToken(
            $code,
            $token->getContent(),
            $token->getChar(),
            $token->getLine()
        );
    }
}