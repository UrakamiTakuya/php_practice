<?php

require_once('TwoCardPoker.php');
require_once('ThreeCardPoker.php');

abstract class PokerHandEvaluator
{
    public function __construct(public array $pokerCards)
    {}

    public abstract function handEvaluator(): string;
}