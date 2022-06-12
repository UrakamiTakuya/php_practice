<?php

use PHPUnit\Framework\TestCase;
require_once(__DIR__ . '/../../lib/practice_vending_machine/VendingMachine.php');
require_once('ItemTest.php');
require_once('DrinkTest.php');
require_once('CupDrinkTest.php');

class VendingMachineTest extends TestCase
{
    // カップコーヒー（カップに注ぐコーヒー）のアイスとホットも選択できるようにします。値段はどちらも100円です
    // カップの在庫管理も行ってください。カップコーヒーが一つ注文されるとカップも在庫から一つ減ります。自動販売機が保持できるカップ数は最大100個とします
    public function testDepositCoin()
    {
        $vendingMachine = new VendingMachine();
        $this->assertSame(0, $vendingMachine->depositCoin(0));
        $this->assertSame(0, $vendingMachine->depositCoin(200));
        $this->assertSame(100, $vendingMachine->depositCoin(100));
    }

    public function testPressButton()
    {
        $vendingMachine = new VendingMachine();

        // お金が投入されていない場合は購入できない
        $this->assertSame('', $vendingMachine->pressButton(new Drink('cider')));

        // 100円入れた時にciderが出る
        $vendingMachine->depositCoin(100);
        $this->assertSame('cider', $vendingMachine->pressButton(new Drink('cider')));

        // 100円入れた時はコーラは購入できない
        $vendingMachine->depositCoin(100);
        $this->assertSame('', $vendingMachine->pressButton(new Drink('cola')));
        // 200円入れた時コーラを購入できる
        $vendingMachine->depositCoin(100);
        $this->assertSame('cola', $vendingMachine->pressButton(new Drink('cola')));

        $vendingMachine->depositCoin(100);
        $vendingMachine->addCup(1);
        $this->assertSame('hot coffee', $vendingMachine->pressButton(new CupDrink('hot coffee')));

        $vendingMachine->depositCoin(100);
        $vendingMachine->addCup(1);
        $this->assertSame('ice coffee', $vendingMachine->pressButton(new CupDrink('ice coffee')));

        // カップがない時はアイスコーヒーとホットコーヒーを購入できない
        $vendingMachine->depositCoin(100);
        $this->assertSame('', $vendingMachine->pressButton(new CupDrink('hot coffee')));

        $vendingMachine->depositCoin(100);
        $this->assertSame('', $vendingMachine->pressButton(new CupDrink('ice coffee')));
    }

    public function testAddCup()
    {
        $vendingMachine = new VendingMachine();
        $this->assertSame(10, $vendingMachine->addCup(10));
        $this->assertSame(60, $vendingMachine->addCup(50));
        $this->assertSame(100, $vendingMachine->addCup(40));
        // カップは101以上補充することはできない
        $this->assertSame(100, $vendingMachine->addCup(50));
    }
}
