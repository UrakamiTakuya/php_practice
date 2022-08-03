<?php

function persistence(int $num) {
    $changeString = (string) $num;
    $numArray = array_map('intval', str_split($changeString));
    $result = 0;
    $count = 0;
    if (count($numArray) < 2) {
        $count = 0;
    } else {
        while(true) {
            $count ++;
            $result = array_product($numArray);
    
            if ($result < 10) {
                break;
            } else {
                $changeString = (string) $result;
                $numArray = array_map('intval', str_split($changeString));
                $result = array_product($numArray);
            }
        }
    }
    return $count;
}

// 文字列からでも配列内を掛け算することができる。 
// var_dump(array_product(str_split($num)));

persistence(1234);
