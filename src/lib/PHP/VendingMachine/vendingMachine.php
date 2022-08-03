<?php

require_once('Item.php');

class VendingMachine
{
    private int $currentCoin = 0;
    private int $currentCup = 0;

    public function depositCoin(int $coin)
    {
        if ($coin === 100) {
            $this->currentCoin += $coin;
        } else {
            $this->currentCoin = 0;
        }
        return $this->currentCoin;
    }

    public function pressButton(Item $item)
    {
        if ($this->currentCoin >= $item->getItemMoney() && $item->getCup() <= $this->currentCup) {
            $this->currentCoin -= $item->getItemMoney();
            $this->currentCup -= $item->getCup();
            return $item->getItem();
        } else {
            return '';
        }
    }

    public function addCup($cup): int
    {
        if ($this->currentCup >= 100) {
            $this->currentCup === 100;
        } else {
            $this->currentCup += $cup;
        }
        return $this->currentCup;
    }
}