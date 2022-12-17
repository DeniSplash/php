<?php

$array1 = array('счастья', 'здоровья', 'успеха', 'богатсва', 'везения', 'любви');
$array2 = array('бесконечного', 'крепкого', 'большого', 'черезмерного', 'великого', 'огромного');

$name = readline('Введите Имя: ');

$count = 3;

$arrayKey1 = array_rand($array1, $count);
$arrayKey2 = array_rand($array2, $count);

$resStr = "";

for ($i = 0; $i < count($arrayKey1); $i++) {
    $word1 = $array2[$arrayKey2[$i]];
    $word2 = $array1[$arrayKey1[$i]];

    $resStr .= $word1 . " " . $word2;

    if ($i < $count - 2) {
        $resStr .= ", ";
    } elseif ($i < $count - 1) {
        $resStr .= " и ";
    }

    if ($i == $count - 1) {
        $resStr .= "!";
    }
}

echo "Дорогой {$name}, от всего сердца поздравляю тебя с днем рождения, желаю ";
echo $resStr;

//================================================================

shuffle($array1);
shuffle($array2);

$resStr = "";

for ($i = 0; $i < $count; $i++) {
    $word1 = array_shift($array2);
    $word2 = array_shift($array1);

    $resStr .= $word1 . " " . $word2;

    if ($i < $count - 2) {
        $resStr .= ", ";
    } elseif ($i < $count - 1) {
        $resStr .= " и ";
    }

    if ($i == $count - 1) {
        $resStr .= "!";
    }
}

echo "\n";
echo "Дорогой {$name}, от всего сердца поздравляю тебя с днем рождения, желаю ";
echo $resStr;