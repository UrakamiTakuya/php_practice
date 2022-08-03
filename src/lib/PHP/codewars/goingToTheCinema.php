<?php

function movie($card, $ticket, $perc) {
    $count = 0;
    $totalTicket = 0;
    $lowedTicket = $ticket;
    while ($totalTicket < $card) {
        $totalTicket += $ticket;
        $lowedTicket *= $perc;
        $card += $lowedTicket;
        var_dump($card);
        $count++;
    }
    var_dump($count);
    return $count;
}


movie(100, 10, 0.95);