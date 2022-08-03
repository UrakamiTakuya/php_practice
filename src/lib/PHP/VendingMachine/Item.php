<?php

// 商品の名前と値段をここで受け取る。
require_once('Drink.php');
require_once('CupDrink.php');

abstract class Item
{
    public function __construct(protected string $item)
    {
    }

    abstract public function getItem();
    abstract public function getItemMoney();
}
