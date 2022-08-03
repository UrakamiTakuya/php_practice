<?php

function toWeirdCase($string) {
    $worlds = explode(" ", $string);
    $wordsList = wordsList($worlds);
    $changeWords = changeWordsUpDown($wordsList);
    var_dump(implode("", $changeWords));
}

function wordsList(array $wors): array {
    $wordsListResult = [];
    foreach ($wors as $word) { $wordsListResult[] = str_split($word); }
    return $wordsListResult;
}

function changeWordsUpDown($wordsList): array {
    $result = [];
    foreach($wordsList as $wordList) {
        for($i = 0; $i < count($wordList); $i++) {
            if ($i % 2 === 0) {
                $result[] = strtoupper($wordList[$i]);
            } else {
                $result[] = mb_strtolower($wordList[$i]);
            }
        }
        $result[] = " ";
    }
    array_pop($result);
    return $result;
}

// function toWeirdCase($string) {
//     // TODO
//     $str = str_split(strtolower($string));
//     for ($n=0; $n<=count($str); $n++) {
//       if ($str[$n]!=" ") {
//         $str[$n] = strtoupper($str[$n]);
//         $n = $n + 1;
//       }
//     }
//     return implode("", $str);
// }


toWeirdCase('WeLl I GuEsS YoU PaSsEd');