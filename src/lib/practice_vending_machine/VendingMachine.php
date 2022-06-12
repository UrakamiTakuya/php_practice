<?php

require_once('Item.php');
require_once('CupDrink.php');
require_once('Drink.php');

class VendingMachine
{
    private int $currentCoin = 0;
    private int $currentCup = 0;
    private const DEPOSIT_COIN = 100;
    private const MAX_CUP = 100;

    public function __construct()
    {
    }

    public function depositCoin($coin): int
    {
        if ($coin === self::DEPOSIT_COIN) {
            return $this->currentCoin += $coin;
        } else {
            return $this->currentCoin = 0;
        }
    }

    public function pressButton(Item $item): string
    {
        if ($this->currentCoin >= $item->getItemMoney() && $this->currentCup >= $item->getCup()) {
            $this->currentCoin -= $item->getItemMoney();
            $this->currentCup -= $item->getCup();
            return $item->getItem();
        } else {
            return '';
        }
    }

    public function addCup($cup): int
    {
        $this->currentCup += $cup;

        if ($this->currentCup > $this::MAX_CUP) {
            return $this->currentCup = $this::MAX_CUP;
        }

        return $this->currentCup;
    }
}
// $v = new VendingMachine();
// var_dump($v->depositCoin(100));
// var_dump($v->pressButton(new Item('cola')));