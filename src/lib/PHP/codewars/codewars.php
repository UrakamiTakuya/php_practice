<?php

function countPositivesSumNegatives(array $input): array {
    $result = [];

    if (count($input) == 0) {
        return $input;
    } else {
        $positiveNumber = array_filter($input, function($input) {
            return $input > 0;
        });
        $negativeNumber = array_filter($input, function($input) {
            return $input < 0;
        });
        $result[] = count($positiveNumber);
        $result[] = array_sum($negativeNumber);
        var_dump($result);
        return $result;
    } 

}

countPositivesSumNegatives([0, 2, 3, 0, 5, 6, 7, 8, 9, 10, -11, -12, -13, -14]);