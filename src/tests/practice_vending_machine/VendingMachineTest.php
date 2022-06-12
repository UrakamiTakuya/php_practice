<?php

use PHPUnit\Framework\TestCase;
require_once(__DIR__ . '/../../lib/practice_vending_machine/VendingMachine.php');

class VendingMachineTest extends TestCase
{
    // 押したボタンに応じて、サイダーかコーラが出るようにしましょう。
    // サイダーは100円、コーラは150円とします。
    // 100円以外のコインは入れられない仕様はそのままです
    // 他の飲み物も追加しよう
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
        $this->assertSame('', $vendingMachine->pressButton(new Item('cider')));

        // 100円入れた時にciderが出る
        $vendingMachine->depositCoin(100);
        $this->assertSame('cider', $vendingMachine->pressButton(new Item('cider')));

        // 100円入れた時はコーラは購入できない
        $vendingMachine->depositCoin(100);
        $this->assertSame('', $vendingMachine->pressButton(new Item('cola')));
        // 200円入れた時コーラを購入できる
        $vendingMachine->depositCoin(100);
        $this->assertSame('cola', $vendingMachine->pressButton(new Item('cola')));

    }
}
