<?php

function find_missing_letter(array $array) {
    $alphabetList = range($array[array_key_first($array)], $array[array_key_last($array)]);
    $result = array_filter(array_count_values(array_merge($array, $alphabetList)), function($unique) {
        return $unique === 1;
    });
    $k = array_flip($result);
    return array_shift($k);

    $expected = range(current($array), end($array));
    $missing = array_diff($expected, $array);
    return end($missing);
}

find_missing_letter(['a','b','c','d','f']);