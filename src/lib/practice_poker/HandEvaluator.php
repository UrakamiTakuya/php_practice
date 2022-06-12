<?php
// 最初の文字列を削除
// カードをランクに変換
class HandEvaluator
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

    public function __construct(private array $cards1, private array $cards2)
    {
    }

    public function changeRank(): array
    {
        $cardRankLists = [];
        foreach([$this->cards1, $this->cards2] as $card) {
            $cardRankLists[] = array_map(fn ($card) => $this::CARD_RANKS[substr($card, $this::SLICE_STANDARD_LENGTH, $this::SLICE_LENGTH)], $card);
        }
        return $cardRankLists;
    }
}
$handEvaluator = new HandEvaluator(['CA', 'DA'], ['C10', 'H4']);
var_dump($handEvaluator->changeRank());