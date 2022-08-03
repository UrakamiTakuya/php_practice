<?php

function longest($a, $b) {
    // aとbの文字列を一つの配列にまとめて入れることができる。
    var_dump(str_split($a . $b));
    // $aArray = str_split($a);
    // $bArray = str_split($b);
    // $result = array_unique(array_merge($aArray, $bArray));
    // sort($result);
    // return implode("", $result);
}

longest("aretheyhere", "yestheyarehere");