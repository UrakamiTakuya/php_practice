<?php

require_once('Drink.php');
require_once('CupDrink.php');

abstract class Item 
{
    public function __construct(private string $item)
    {}

    public abstract function getItem();
    public abstract function getItemMoney();
    public abstract function getCup();
}