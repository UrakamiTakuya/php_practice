<?php

function duplicates($array){
    // if ($array === [] || count($array) === 1) {
    //     return 0;
    // }

    // $unique = array_count_values($array);
    // print_r($unique);
    // $uniqueFilter = array_filter($unique, function($unique) { return $unique >= 2; });
    
    return array_sum(array_map(function($n) {
        return floor($n/2);
      }, array_count_values($array)));
}

duplicates([1, 2, 2, 20, 6, 20, 2, 6, 2]);