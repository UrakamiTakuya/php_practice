<?php

function sumFracts($numbers) {
    $denominatorList = createDenominatorList($numbers);
    $maximumHookMultiplier = createMaximumHookMultiplier($denominatorList);
}

function createDenominatorList(array $numbers): array {
    $denominatorList = [];
    foreach ($numbers as $number) { $denominatorList[] = $number[1]; }
    return $denominatorList;
}

function createMaximumHookMultiplier(array $denominatorList) {
    // $i = 0;
    // $maximumHookMultiplierList = [];
    // while (true) {
    //     $maximumHookMultiplierList = array_map(function($denominator) use ($i) {
    //         $i++;
    //         var_dump($i);
    //         $denominator * $i;
    //     }, $denominatorList);
    //     if (count(array_unique($maximumHookMultiplierList)) === 1) {
    //         break;
    //     }
    // }
    // var_dump($maximumHookMultiplierList);
    $maximumHookMultiplierList = array_map(function($denominator) {
        $i = 0;
        $sameDenominatorList = 0;
        while ($i < 3) {
            $i++;
            $sameDenominatorList = $denominator * $i;
        }
        var_dump($sameDenominatorList);
        return $sameDenominatorList;
        // var_dump($sameDenominatorList);
    } ,$denominatorList);
    // var_dump($maximumHookMultiplierList);
}

sumFracts([[1, 2], [1, 3], [1, 4]]);