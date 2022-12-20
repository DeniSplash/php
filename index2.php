<?php

$array = [4, 5, 1, 4, 7, 8, 15, 6, 71, 45, 2];
$res = [];

$res = calc($array);
print_r($res);

function calc(array $array): array
{
    $res["max"] = max($array);
    $res["min"] = min($array);
    $res["avg"] = array_sum($array) / count($array);
    return $res;
};