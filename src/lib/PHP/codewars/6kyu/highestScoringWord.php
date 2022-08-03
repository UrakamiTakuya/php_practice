<?php

function high($x): string {
    define('ALPHABET_RANKS', (function() {
        $alphabetRanks = [];
        foreach(range("a", "z") as $key => $value) {
            $alphabetRanks[$value] = $key + 1; 
        }
        return $alphabetRanks;
    })());
    $alphabetList = explode(" ", $x);
    $rankList = changeRanks($alphabetList);
    $sortRanks = sortRank($alphabetList, $rankList);
    return result($sortRanks);
}

function changeRanks(array $alphabetList): array {
    $ranks = [];
    for ($i = 0; $i < count($alphabetList); $i++) {
        $rank = 0;
        foreach(str_split($alphabetList[$i], 1) as $alphabet) {
            $rank += ALPHABET_RANKS[$alphabet];
        }
        $ranks[] = $rank;
    }
    return $ranks;
}

function sortRank(array $alphabetList, array $rankList): array {
    $sortRanks = [];
        for ($i = 0; $i < count($rankList); $i++) {
            $sortRanks[$alphabetList[$i]] = $rankList[$i];
        }
    asort($sortRanks);
    return $sortRanks;
}

function result($sortRanks): string {
    $result = '';
    if (count(array_unique($sortRanks)) === 1) {
        $array = [];
        foreach ($sortRanks as $key => $value) { $array[] = $key; }
        $result = $array[0];
    } else {
        $flip = array_flip($sortRanks);
        $result = end($flip);
    }
    return $result;
}

high('b aa');