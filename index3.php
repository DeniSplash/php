<?php

$box = [
    [
        0 => 'Тетрадь',
        1 => 'Книга',
        2 => 'Настольная игра',
        3 => [
            'Настольная игра',
            'Настольная игра',
        ],
        4 => [
            [
                'Ноутбук',
                'Зарядное устройство'
            ],
            [
                'Компьютерная мышь',
                'Набор проводов',
                [
                    'Фотография',
                    'Картина'
                ]
            ],
            [
                'Инструкция',
                [
                    'Ключ'
                ]
            ]
        ]
    ],
    [
        0 => 'Пакет кошачьего корма',
        1 => [
            'Музыкальный плеер',
            'Книга'
        ]
    ]
];

$res = search('Зарядное устройство', $box);
var_dump($res);

$text = (string) readline("Введите название: ");
$res = search($text, $box);
var_dump($res);
function search(string $name, array $array): bool
{
    foreach ($array as $value) {

        if (is_array($value)) {
            $res = search($name, $value);
            if ($res === true) {
                return true;
            }
        } elseif ($name === $value) {
            return true;
        }
    }
    return false;
};