<?php

function isNice($arrays) {
    $additionArr = array_map(function($arrays) { return $arrays + 1; }, $arrays);
    $subtractionArr = array_map(function($arrays) { return $arrays - 1; }, $arrays);
    ($arrays === []) ? $result = false :  $results = [];

    foreach ($arrays as $array) {
        $result = true;
        if (in_array($array + 2, $additionArr, false) || in_array($array - 2, $subtractionArr, false)) {
            $result = true;
        } else {
            $result =  false;
        }
        var_dump($result);
        $results[] = $result;   
    }
    $falseList = array_filter($results, function($results) { return $results == false; });
    (count($falseList) > 0) ? false: true;
}

// function isNice($arr) {
//     foreach($arr as $number) {
//         if(in_array($number + 1, $arr) || in_array($number - 1, $arr)){
//             $isNice = true;
//         } else {
//             $isNice = false;
//             break;
//         }
//     }
//     if ($isNice == true)
// }

isNice([3, 2, 10, 4, 1, 6]);