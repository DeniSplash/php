<?php

$array = [4, 5, 1, 4, 7, 8, 15, 6, 71, 45, 2];

$b = array_map('calc', $array);
print_r($b);
function calc(int $n): string
{
    $res = ($n & 1) ? $n . " - Нечетное" : $n . " - Четное";
    return $res;
};