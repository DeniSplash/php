<?php

$students = [
    'ИТ20' => [
        'Иванов Иван' => 5,
        'Кириллов Кирилл' => 3,
        'Петров Иван' => 5,
        'Сидоров Олег' => 2,
    ],
    'БАП20' => [
        'Антонов Антон' => 4,
        'Денисов Антон' => 2,
        'Климанов Антон' => 2
    ],
    'ЛАП20' => [
        'Фролов Антон' => 2,
        'Легков Антон' => 4,
        'Самсонов Антон' => 4
    ]
];

$arrayGroup = array();
$arrayStudents = array();

foreach ($students as $keyGroup => $group) {

    foreach ($group as $keyValuse => $value) {
        $arrayGroup[$keyGroup] += $value;

        if ($value < 3) {
            $arrayStudents[$keyGroup][] = $keyValuse;
        }
    }

    $arrayGroup[$keyGroup] = $arrayGroup[$keyGroup] / count($group);
}

echo "Рейтинг по группам: \n";
arsort($arrayGroup);
foreach ($arrayGroup as $key => $val) {
    echo "$key = $val\n";
}
echo "Первое место - " . array_keys($arrayGroup)[0] . "\n";

echo "Список студентов на отчисление: \n";
print_r($arrayStudents);