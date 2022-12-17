<?php

$array1 = array(1, 2, 3, 4, 6, 7, 8, 9, 10);
$array2 = array(1, 2, 3, 4, 6, 7, 8, 9, 10);
$arrayRes = array();

foreach ($array1 as $key => $item1) {
    $arrayRes[] = $item1 * $array2[$key];
}

print_r($arrayRes);

//================================================================

for ($i = 0; $i < count($array1); $i++) {
    $array2[$i] = $array1[$i] * $array2[$i];
}

print_r($array2);