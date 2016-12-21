<h2>Функции массивов</h2>
<?php

$arr = [1, 2, 3, 4];

info($arr);

echo "<h3>Вставка/извлечение элементов с конца</h3>";

//$arr[] = 5;
array_push($arr, 50);

info($arr);

$last = array_pop($arr);

info($arr);
info("last: %m%", $last);

echo "<h3>Вставка/извлечение элементов с начала</h3>";

array_unshift($arr, -100);

info($arr);

$first = array_shift($arr);

info($arr);

info("first: %m%", $first);

echo "<h3>Получение части массива</h3>";

//$arr = [
//    "one" => 1,
//    "two" => 2,
//    "tree" => 3,
//    "four" => 4
//];

$slice = array_slice($arr, 1, 2);
echo "slice";
info($slice);

info($arr);

$splice = array_splice($arr, 1, 2, [100, 200, 300]);
echo "splice";
info($splice);

info($arr);

echo "<h3>Разделение одного массива на несколько</h3>";

$chunks = array_chunk($arr, 2);

info($chunks);

echo "<h3>Слияние массивов</h3>";

$arr = array_combine(["one", "two", "tree"], [1, 2, 3]);

info($arr);

echo "<h4>получить только ключ массива</h4>";
$keys = array_keys($arr);
info($keys);

echo "<h4>получить только значения</h4>";
$values = array_values($arr);
info($values);

echo "<h3>Обход массива</h3>";

$d = 10;
array_walk($arr, function ($v, $k, $data) {
    info("$k => " . ($v + $data));
}, $d);

echo "<h3>Рекурсивный обход</h3>";
$arr = [
    ['one' => 1, 2, 3, 4, 5],
    10 => [11, 12, 13, 14, 15],
    [21, 22, 23, 24, 25]
];
array_walk_recursive($arr, function ($v, $k, $data){
    info("$k => " . ($v + $data));
}, $d);

echo "<h3>Сортировки</h3>";

$students = [
    "std6454" => "Вася",
    "std9405" => "Петя",
    "std3685" => "Даша",
    "std7406" => "Саша",
    "std746" => "Саша",
    "std2764" => "Рита",
    "std283" => "Гена"
];

echo "<h4>сортировка по возрастанию без сохранения ключей</h4>";
sort($students);
info($students);

$students = [
    "std6454" => "Вася",
    "std9405" => "Петя",
    "std3685" => "Даша",
    "std7406" => "Саша",
    "std746" => "Саша",
    "std2764" => "Рита",
    "std283" => "Гена"
];
echo "<h4>сортировка по убыванию без сохранения ключей</h4>";
rsort($students);
info($students);

$students = [
    "std6454" => "Вася",
    "std9405" => "Петя",
    "std3685" => "Даша",
    "std7406" => "Саша",
    "std746" => "Саша",
    "std2764" => "Рита",
    "std283" => "Гена"
];
echo "<h4>сортировка по значениям по возрастанию с сохранением ключей</h4>";
asort($students);
info($students);

$students = [
    "std6454" => "Вася",
    "std9405" => "Петя",
    "std3685" => "Даша",
    "std7406" => "Саша",
    "std746" => "Саша",
    "std2764" => "Рита",
    "std283" => "Гена"
];
echo "<h4>сортировка по значениям по убыванию с сохранением ключей</h4>";
arsort($students);
info($students);

$students = [
    "std6454" => "Вася",
    "std9405" => "Петя",
    "std3685" => "Даша",
    "std7406" => "Саша",
    "std746" => "Саша",
    "std2764" => "Рита",
    "std283" => "Гена"
];
echo "<h4>сортировка по ключам по возрастанию</h4>";
ksort($students, SORT_NATURAL);
info($students);

echo "<h4>естественная сортировка</h4>";
$keys = array_keys($students);
info($keys);
natsort($keys);
info($keys);

echo "<h4>пользовательская сортировка по значениям</h4>";
function cmp($a, $b)
{
    return $a - $b;
}
$arr = [2, 6, 1, -1, 4];
info($arr);
usort($arr, "cmp");
info($arr);

// аналогично пользовательская сортировка
// с сохранением ассоциации с ключами
//uasort()

// ... и по ключам
//uksort()

$arr = array(
    array("10", 11, 100, 100, "a"),
    array(   1,  2, "2",   3,  1)
);
info($arr);
echo "<h4>многомерная сортировка</h4>";
array_multisort($arr[1], SORT_DESC, $arr[0], SORT_DESC);
info($arr);

echo "<h4>перемешивание без сохранения ключей</h4>";
$arr = range(0, 10);
info($arr);
shuffle($arr);
info($arr);

// echo "<h3>Получить колонку 'name' массива $table</h3>";
$table = [
    0 => [
        "id" => 0,
        "name" => 'first'
    ],
    1 => [
        "id" => 1,
        "name" => 'second'
    ],
    2 => [
        "id" => 2,
        "name" => 'third'
    ]
];

// Без функции array_column
foreach ($table as $row) {
    if (array_key_exists('name', $row)) {
        $arr [] = $row ['name'];
    }
}
//print_array ( $arr );
clear_globals([
    'table'
]);

// С функцией array_column

clear_globals();
// -------------------------------------------------------------------------
// echo "<h3>Создать массив из переменных $a,$b,...$e</h3>";
$a = 1;
$b = 2;
$c = 3;
$d = 4;
$e = 5;

// Без функции compact
$arr = [
    'a' => $a,
    'b' => $b,
    'c' => $c,
    'd' => $d,
    'e' => $e
];
//print_array ( $arr );

// С функцией compact

clear_globals();
// -------------------------------------------------------------------------
// echo "<h3>Извлекает переменные из массива</h3>";
$arr = [
    'user' => 'basename',
    'password' => '12345',
    'email' => 'mail@mail.com'
];

// без функции extract
$user = 'test'; // $arr ['user'];
$password = $arr ['password'];
$email = $arr ['email'];

// clear_globals (['arr']);
// с функцией extract


//echo "user: $user password: $password email: $email" . nl2br ( "" );

// -------------------------------------------------------------------------
// echo "<h3>Сгенерировать числовой массив 0..9</h3>";
// Без функции range
clear_globals();
for ($i = 0; $i < 10; $i++) {
    $arr [] = $i;
}
//print_array ( $arr );

// С функцией range
clear_globals();

clear_globals();

// -------------------------------------------------------------------------
// echo "<h3>Найти все нечетные значения числового массива</h3>;
$arr = range(0, 10);
// Без функции array_filter
foreach ($arr as $k => $v) {
    if ($v % 2) {
        $odds [$k] = $v;
    }
}
//print_array ( $odds );
clear_globals([
    'arr'
]);

// с функцией array_filter

//print_array ( $odds );
clear_globals();

// -------------------------------------------------------------------------
// echo "<h3>Заполнить массив одинаковыми значениями</h3>";
// Без функции array_fill
for ($i = 0; $i < 10; $i++) {
    $arr [$i] = "value";
}
//print_array ( $arr );
clear_globals();

// С функцией array_fill

clear_globals();

// -------------------------------------------------------------------------
// echo "<h3>Найти произведение элементов массива</h3>";
$arr = range(1, 10);

// Без функции array_reduce
$prod = 1;
foreach ($arr as $v) {
    $prod = $prod * $v;
}
//print ("\$prod = " . $prod . "<br />") ;
clear_globals([
    'arr'
]);

// С функцией array_reduce

clear_globals();

// -------------------------------------------------------------------------
// echo "<h3>Извлечение значений элементов массива в переменные $a, $b, $c</h3>";
$arr = [
    'one',
    'shome data',
    'two',
    'three'
];
// Без list()
$a = $arr [0];
$b = $arr [1];
$c = $arr [2];
//echo "\$a = $a \$b = $b \$c = $c <br />";
clear_globals([
    'arr'
]);

// С list

clear_globals();

// -------------------------------------------------------------------------
// echo "<h3>Перебрать элементы ассоциированного массива без ключей</h3>";
$arr = [
    'k1' => 'v1',
    'k2' => 'v2',
    'k3' => 'v3'
];

// Без функций current (pos), reset, prev, next, end
foreach ($arr as $value) {
    //echo "$value <br />";
}

// С функциями current (pos), reset, prev, next, end

// -------------------------------------------------------------------------
// echo "<h3>Перебрать элементы ассоциированного массива с ключами</h3>";
$arr = [
    'k1' => 'v1',
    'k2' => 'v2',
    'k3' => 'v3'
];

// Без функции each
foreach ($arr as $key => $value) {
    //echo "$key => $value <br />";
}

// С функциями current (pos), reset, prev, next, end
