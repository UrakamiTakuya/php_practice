<?php

function wave($people): array {
    $stringArray = str_split($people);
    $changeUpperStringArray = array_map(function($stringArray) { return strtoupper($stringArray); }, $stringArray);
    $waveList = changeWave($stringArray, $changeUpperStringArray);
    return array_filter(displayList($waveList), function($result) {return $result != "";});
}

function changeWave(array $stringArray, array $changeUpperStringArray): array {
    $result = [];
    for ($i = 0; $i < count($stringArray); $i++) {
        $stringArray = array_map('strtolower', $stringArray);
        if ($stringArray[$i] === " ") {
            continue;
        } else {
            unset($stringArray[$i]);
            $stringArray[$i] = $changeUpperStringArray[$i];
            ksort($stringArray);
            $result[] = $stringArray;
        }
    }
    return $result;
}

function displayList(array $waveList): array {
    $result = [];
    foreach ($waveList as $wave) {
        $result[] = implode("", $wave);
    }
    return $result;
}

// function wave($people){
//     $result = [];
    
//     for($i = 0; $i < strlen($people); $i++) {
//         // ctype_spaceで空欄かどうかを調べる
//         if(ctype_space($people[$i])) continue;
//         // substr_replace — 文字列の一部を置換する
//         $result[] = substr_replace($people, strtoupper($people[$i]), $i, 1);
//     }
//     return $result;
// }

// function wave($people){
//     if (trim($people) == '') return [];
    
//     $array = [];
    
//     for ($x = 0; $x < strlen($people); $x++) {
//         var_dump($people);
//       if ($people[$x] == ' ') continue;
      
//       $string = $people;
//       $string[$x] = strtoupper($string[$x]);
      
//       $array[] = $string;
//     }
    
//     return $array;
//   }

wave("two words");