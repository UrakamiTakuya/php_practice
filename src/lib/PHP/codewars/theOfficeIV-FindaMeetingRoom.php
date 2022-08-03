<?php

function meeting($rooms) {
  $key = array_search('O', $rooms);
  return ($key)? $key: "None available!";
}

meeting(['X', 'O', 'X']);