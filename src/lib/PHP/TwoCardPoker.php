<?php

/*
 * ◯お題
 *
 * 2枚の手札でポーカーを行います。ルールは次の通りです。
 *
 * ・プレイヤーは2人です
 * ・各プレイヤーはトランプ2枚を与えられます
 * ・ジョーカーはありません
 * ・与えられたカードから、役を判定します。役は番号が大きくなるほど強くなります
 *   1. ハイカード：以下の役が一つも成立していない
 *   2. ペア：2枚のカードが同じ数字
 *   3. ストレート：2枚のカードが連続している。A は 2 と K の両方と連続しているとみなし、A を含むストレート は、A-2 と K-A の2つです
 * ・2つの手札について、強さは以下に従います
 *   1. 2つの手札の役が異なる場合、より上位の役を持つ手札が強いものとする
 *   2. 2つの手札の役が同じ場合、各カードの数値によって強さを比較する
 * 　  ・（弱）2, 3, 4, 5, 6, 7, 8, 9, 10, J, Q, K, A (強)
 * 　  ・ハイカード：一番強い数字同士を比較する。左記が同じ数字の場合、もう一枚のカード同士を比較する
 * 　  ・ペア：ペアの数字を比較する
 * 　  ・ストレート：一番強い数字を比較する (ただし、A-2 の組み合わせの場合、2 を一番強い数字とする。K-A が最強、A-2 が最弱)
 * 　  ・数値が同じ場合：引き分け
 * 　
 * それぞれの役と勝敗を判定するプログラムを作成ください。
 *
 * ◯仕様
 *
 * それぞれの役と勝敗を判定するshowDownメソッドを定義してください。
 * showDownメソッドは引数として、プレイヤー1のカード、プレイヤー1のカード、プレイヤー2のカード、プレイヤー2のカードを取ります。
 * カードはH1〜H13（ハート）、S1〜S13（スペード）、D1〜D13（ダイヤ）、C1〜C13（クラブ）、となります。ただし、Jは11、Qは12、Kは13、Aは1とします。
 * showDownメソッドは返り値として、プレイヤー1の役、プレイヤー2の役、勝利したプレイヤーの番号、を返します。引き分けの場合、プレイヤーの番号は0とします。
 *
 * ◯実行例
 *
 * showDown('CK', 'DJ', 'C10', 'H10')  //=> ['high card', 'pair', 2]
 * showDown('CK', 'DJ', 'C3', 'H4')  //=> ['high card', 'straight', 2]
 * showDown('C3', 'H4', 'DK', 'SK')  //=> ['straight', 'pair', 1]
 * showDown('HJ', 'SK', 'DQ', 'D10')  //=> ['high card', 'high card', 1]
 * showDown('H9', 'SK', 'DK', 'D10')  //=> ['high card', 'high card', 2]
 * showDown('H3', 'S5', 'D5', 'D3')  //=> ['high card', 'high card', 0]
 * showDown('CA', 'DA', 'C2', 'D2')  //=> ['pair', 'pair', 1]
 * showDown('CK', 'DK', 'CA', 'DA')  //=> ['pair', 'pair', 2]
 * showDown('C4', 'D4', 'H4', 'S4')  //=> ['pair', 'pair', 0]
 * showDown('SA', 'DK', 'C2', 'CA')  //=> ['straight', 'straight', 1]
 * showDown('C2', 'CA', 'S2', 'D3')  //=> ['straight', 'straight', 2]
 * showDown('S2', 'D3', 'C2', 'H3')  //=> ['straight', 'straight', 0]
*/

// 用件定義
// 持っているカードで一番強いカードを表示
// プレイヤーの役を表示して強さ比較。high card < pair < straight
//  0:引き分け, 1:player1勝利:, 2:player2勝利

const CARD_RANKS = [
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
const HIGH_CARD = 'high card';
const PAIR = 'pair';
const STRAIGHT = 'straight';
const DRAW = 0;
const WINNER_PLAYER1 = 1;
const WINNER_PLAYER2 = 2;
const ROLE_RANKS = [
    HIGH_CARD => 1,
    PAIR => 2,
    STRAIGHT => 3
];

function showDown(/* player1 */ string $player1Card1, string $player1Card2, /* player2 */  string $player2Card1, string $player2Card2)
{
    $cardRanks = changeRankNumber([$player1Card1, $player1Card2, $player2Card1, $player2Card2]);
    $dividePlayerCard = array_chunk($cardRanks, 2);
    $playersRole = array_map(fn ($playerCard) =>  playersRoleList($playerCard[0], $playerCard[1]),$dividePlayerCard);
    $judgeWinner = judgeWinner($playersRole);
}

function changeRankNumber(array $cards): array
{
    return array_map(fn($cards) => CARD_RANKS[substr($cards, 1, 2)], $cards);
}

function playersRoleList(int $card1, int $card2): array
{
    $role = HIGH_CARD;

    if (isPair($card1, $card2)) {
        $role = PAIR;
    } elseif (isStraight($card1, $card2)) {
        $role = STRAIGHT;
    } else {
        $role = HIGH_CARD;
    }

    return [
        'role' => $role,
        'roleStrong' => ROLE_RANKS[$role],
        'maxCardRank' => max([$card1, $card2])
    ];
}

function isPair(int $card1, int $card2): bool
{
    return $card1 === $card2;
}

function isStraight(int $card1, int $card2): bool
{
    return abs($card1 - $card2) === 1 ;
}

function isCheckMax(): bool
{
    return max(CARD_RANKS) - min(CARD_RANKS) === 12;
}

function judgeWinner($playersRole): array
{
    $winner = DRAW;

    if ($playersRole['roleStrong'][0] > $playersRole['roleStrong'][1]) {
        $winner = WINNER_PLAYER1;
    } elseif ($playersRole['roleStrong'][0] < $playersRole['roleStrong'][1]) {
        $winner = WINNER_PLAYER2;
    } else {
        $winner = DRAW;
    }
    // 役が同じ場合数字の大きい者が勝者
    if ($playersRole['role'][0] === $playersRole['role'][1]) {
        
    }

    return [
        $playersRole['role'][0],
        $playersRole['role'][1],
        $winner
    ];
}

showDown('CK', 'D9', 'CA', 'HA');