<?php

function mxdiflg($a1, $a2) {
    $a1List = array_map(function($a1) {
        return strlen($a1);
    }, $a1);
    $a2List = array_map(function($a2) {
        return strlen($a2);
    }, $a2);

    var_dump(abs(array_sum($a1List) - array_sum($a2List)));
}

$s1 = ["ejjjjmmtthh", "zxxuueeg", "aanlljrrrxx", "dqqqaaabbb", "oocccffuucccjjjkkkjyyyeehh"];
$s2 = ["bbbaaayddqbbrrrv"];

mxdiflg($s1, $s2);