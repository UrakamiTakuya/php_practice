<?php

function sum_of_minimums($numbers)
{
    // $minNumbers = [];
    // foreach ($numbers as $number) {
    //     $minNumbers[] = min($number);
    // }
    // return array_sum($minNumbers);
    print_r(array_map('min', $numbers));

    return array_sum(array_map('min', $numbers));
}

sum_of_minimums([[ 7,9,8,6,2 ], [6,3,5,4,3], [5,8,7,4,5]]);