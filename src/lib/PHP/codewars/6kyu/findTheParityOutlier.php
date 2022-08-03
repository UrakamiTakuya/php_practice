<?php

function find($integers) {
    $oddFilter = array_filter($integers, function($integers){ return !($integers % 2 === 0); });
    $evenFilter = array_filter($integers, function($integers){ return ($integers % 2 === 0); });
    if (count($oddFilter) === 1) {
        foreach($oddFilter as $f) { return $f; }
    } else {
        foreach($evenFilter as $f) { return $f; }
    }
}

find([100, 101, 102]);
