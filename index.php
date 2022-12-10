<?php

$name = readline("Ваше имя: ");
$age = readline("Ваш возвраст: ");

echo "Вас зовут {$name}, вам {$age} лет\n";

$countTask = 3;
$arrayTask = array();
$arrayTimeTask = array();

for ($i = 1; $i <= $countTask; $i++) {
    $arrayTask[$i] = readline("Какая {$i} задача стоит перед вами сегодня?: ");
    $arrayTimeTask[$i] = readline("Сколько примерно времени {$i} задача займет?: ");
}

echo "{$name}, сегодня у вас запланировано {$countTask} приоритетных задачи 
на день:\n";

$countSummTime = 0;

for ($i = 1; $i <= $countTask; $i++) {
    echo "- {$arrayTask[$i]} ({$arrayTimeTask[$i]})\n";
    $countSummTime += $arrayTimeTask[$i];
}

echo "Примерное время выполнения плана = {$countSummTime}ч";

?>