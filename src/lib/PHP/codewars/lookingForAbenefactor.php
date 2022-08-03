<?php

function newAvg($arr, $newavg) {
    $division = count($arr) + 1;
    $x = round(($division * $newavg) - array_sum($arr));
    if ($x <= 0) {
        throw new Exception('ValueError');
    }
    return $x;
}
