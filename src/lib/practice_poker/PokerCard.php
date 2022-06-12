<?php
// 最初の文字列を削除
// カードをランクに変換
class PokerCard
{
    private const CARD_RANKS = [
        '2' => 1, 
        '3' => 2, 
        '4' => 3, 
        '5' => 4, 
        '6' => 5, 
        '7' => 6, 
        '8' => 7, 
        '9' => 8, 
        '10' => 9, 
        'J' => 10, 
        'Q' => 11, 
        'K' => 12, 
        'A' => 13, 
    ];
    private const SLICE_STANDARD_LENGTH = 1;
    private const SLICE_LENGTH = 2;

    public function __construct(private string $card)
    {
    }

    public function changeRank(): int
    {
        return $this::CARD_RANKS[substr($this->card, $this::SLICE_STANDARD_LENGTH, $this::SLICE_LENGTH)];
    }
}
$handEvaluator = new PokerCard('CA');
var_dump($handEvaluator->changeRank());