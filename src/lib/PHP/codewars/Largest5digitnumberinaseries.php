<?php

function solution(string $s) {
    $max = 0;
    for($i = 0; $i <= strlen($s) - 5; ++ $i) {
        $number = substr($s, $i, 5);
        var_dump($number);
        if ($number > $max) {
            $max = $number;
        }
    }
    return $max;
}

solution('1234567898765');