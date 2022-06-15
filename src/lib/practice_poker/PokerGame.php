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

            self::selectPokerGame($this->cards1);
            $hand = new HandEvaluator();
            $cardRankLists[] = $hand->changeRole($pokerCards);
        }
        var_dump($cardRankLists);
        return $cardRankLists;
    }

    // 配列が2の時new TwoPokerCard()。配列が3の時new ThreePokerCard().
    public function selectPokerGame(array $cards1): object
    {
        if (count($cards1) === 2) {
            return new TwoPokerCard();
        } else {
            return new ThreePokerCard();
        }
    }
}
$game = new PokerGame(['CA', 'DA'], ['C10', 'H4']);
$game = new PokerGame(['CA', 'DA', 'KA'], ['C10', 'H4', 'D5']);
$game->start();