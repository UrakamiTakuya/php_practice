<?php

function arrayDiff($a, $b) {
    $diff = array_diff($a, $b);
    $result = [];
    foreach ($diff as $d) { $result[] = $d; }
    return $result;
}

arrayDiff([1, 2], [1]);