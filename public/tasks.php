<?php

function add($a, $b) {
    return $a + $b;
}
function subtract($a, $b) {
    return $a - $b;
}
function multiply($a, $b) {
    return $a * $b;
}
function divide($a, $b) {
    return $b != 0 ? $a / $b : 'На ноль делить нельзя!';
}


function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case 'add':
            return add($arg1, $arg2);
        case 'subtract':
            return subtract($arg1, $arg2);
        case 'multiply':
            return multiply($arg1, $arg2);
        case 'divide':
            return divide($arg1, $arg2);
        default:
            return 'Неизвестная операция';
    }
}


$regions = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Рязанская область' => ['Рязань', 'Касимов', 'Скопин']
];


function translit($string) {
    $converter = [
        'а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'yo','ж'=>'zh','з'=>'z',
        'и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r',
        'с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'ts','ч'=>'ch','ш'=>'sh','щ'=>'sch',
        'ъ'=>'','ы'=>'y','ь'=>'','э'=>'e','ю'=>'yu','я'=>'ya'
    ];
    return strtr(mb_strtolower($string), $converter);
}


function power($val, $pow) {
    if ($pow == 0) return 1;
    return $val * power($val, $pow - 1);
}


function getWordForm($number, $forms) {
    $number = abs($number) % 100;
    $n1 = $number % 10;
    if ($number > 10 && $number < 20) return $forms[2];
    if ($n1 > 1 && $n1 < 5) return $forms[1];
    if ($n1 == 1) return $forms[0];
    return $forms[2];
}

function currentTimeString() {
    $hours = (int)date('G');
    $minutes = (int)date('i');

    $hourForm = getWordForm($hours, ['час', 'часа', 'часов']);
    $minuteForm = getWordForm($minutes, ['минута', 'минуты', 'минут']);

    return "$hours $hourForm $minutes $minuteForm";
}

// --- Вывод результатов ---

echo "--- Арифметические операции ---\n";
echo "10 + 5 = " . add(10, 5) . "\n";
echo "10 - 5 = " . subtract(10, 5) . "\n";
echo "10 * 5 = " . multiply(10, 5) . "\n";
echo "10 / 5 = " . divide(10, 5) . "\n";
echo "10 / 0 = " . divide(10, 0) . "\n";

echo "\n--- mathOperation ---\n";
echo "10 multiply 5 = " . mathOperation(10, 5, 'multiply') . "\n";
echo "10 divide 0 = " . mathOperation(10, 0, 'divide') . "\n";

echo "\n--- Города по областям ---\n";
foreach ($regions as $region => $cities) {
    echo $region . ': ' . implode(', ', $cities) . "\n";
}

echo "\n--- Транслитерация ---\n";
echo translit("Привет мир") . "\n";

echo "\n--- Возведение в степень ---\n";
echo "2^3 = " . power(2, 3) . "\n";

echo "\n--- Текущее время ---\n";
echo currentTimeString() . "\n";