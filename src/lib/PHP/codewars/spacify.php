<?php
function spacify(string $s) {
  return print_r(implode(" ", mb_str_split($s)));
}
spacify("hello world");