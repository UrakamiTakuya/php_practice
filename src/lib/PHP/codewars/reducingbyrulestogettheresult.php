<?php

function reduce_by_rules($numbers, $rules) {
    $function1 = $rules[0];
    $function2 = $rules[1];

    $rule1 = $function1($numbers[0], $numbers[1]);
    $rule2 = $function2($rule1, $numbers[2]);
    return $function1($rule2, $numbers[3]);
}

reduce_by_rules([2.0, 2.0, 3.0, 4.0], [
    function ($a, $b) {
      return $a + $b;
    },
    function ($a, $b) {
      return $a - $b;
    }
  ]);