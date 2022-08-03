<?php

function nbYear($p0, $percent, $aug, $p) {
    $percent = $percent / 100;
    $result = 0;

    while($p0 < $p) {
        $p0 = $p0 + $p * $percent + $aug;
        var_dump($p0);
        $result += 1;
    }
    return $result;
}
nbYear(1500, 5, 100, 5000);