<?php

// function killMonsters($h, $m, $dm) {
//     $countDownMonster = 1;
//     $countPunch = 0;
//     $hits = 0;
//     $result = "";
//     while($m > 0) {
//         $countPunch++;
//         $damage = $dm * $hits;
//         $m -= $countDownMonster+1;
//         var_dump($damage);

//         if ($countPunch % 3 === 0) {
//             $hits ++;
//             $h -= $dm;
//             if ($h <= 0) {
//                 $result = "hero died";
//                 break;
//             }
//         }
//         $result = "hits: ${hits}, damage: ${damage}, health: ${h}";
//     }
//     var_dump($result);
//     return $result;
// }

function killMonsters($health, $monsters, $damage) {
    $result = ["hits"=> 0, "health" => $health, "damage" => 0];
    $bool = false;
    
    for($i = 0; $i < $monsters; $i++){
      if($i % 3){
        $bool = true;
      } elseif($bool){
        $result["health"] -= $damage;
        $result["hits"]++;
        $result["damage"] += $damage;
        $bool = false;
      }
    }
    
    return $result["health"] > 0 ? "hits: ".$result["hits"].", damage: ".$result["damage"].", health: ".$result["health"] : "hero died";
    
}

killMonsters(50/*サイタマのHP*/, 7/*モンスターの数*/, 10/*モンスターが与えてくるダメージ*/);