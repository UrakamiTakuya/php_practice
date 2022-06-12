<?php
 // 与えられたカードのランクを返すようにします
require_once('PokerCard.php');
require_once('PokerPlayer.php');
require_once('HandEvaluator.php');

class PokerGame
{
    public function __construct(public array $cards1, public array $cards2)
    {
    }

    public function start(): array
    {
        $cardRankLists = [];
        foreach([$this->cards1, $this->cards2] as $card) {
            $pokerCards = array_map(fn ($card) => new PokerCard($card) ,$card);
            $player = new PokerPlayer($pokerCards);
            $cardRanks = $player->getRank();
            $cardRankLists[] = $cardRanks;
            var_dump($cardRanks);
        }
        $handEvaluator = array_map(fn ($cardRankList) => new HandEvaluator($cardRankList[0], $cardRankList[1]), $cardRankLists);

        return $cardRankLists;
    }
}
$game = new PokerGame(['CA', 'DA'], ['C10', 'H4']);
$game->start();