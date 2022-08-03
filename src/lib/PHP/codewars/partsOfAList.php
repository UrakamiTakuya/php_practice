<?php

// function partlist($arr) {
//     $count = count($arr);
//     $array1 = []; 
//     $array2 = $arr;
//     $results = [];

//     for ($i = 0; $i < $count; $i++) {
//         $takeOutString = array_shift($array2);
//         $array1[] = $takeOutString;
//         $results[] = array_merge([implode(" ", $array1)], [implode(" ", $array2)]);
//     }
//     var_dump($results);
//     return $results;
// }

function partlist($arr) {
    $list = [];
    for ($i = 1; $i < count($arr); $i++) {
      $list[] = [
        implode(" ", array_slice($arr, 0, $i)),
        implode(" ", array_slice($arr, $i))
      ];
    }
    var_dump($list);
    return $list;
}

partList(["I", "wish", "I", "hadn't", "come"]);