<?php

function calc($s) {
    // $inputList = str_split($s);
    // $ascList1 = array_map(function($inputList) {
    //     return ord($inputList);
    // }, $inputList);
    // $total1 = intval(implode("", $ascList1));
    // $total1List = str_split($total1);
    // $ascList2 = array_filter($total1List, function($total1List) {
    //     return $total1List != "7";
    // });
    // array_push($ascList2, "1");
    // $total2 = intval(implode("", $ascList2));

    // return $total1 - $total2;

    $total1 = implode(array_map(fn(string $s) => ord($s), str_split($s)));
    $total2 = str_replace('7', '1', $total1);
    
}

calc("ABC");