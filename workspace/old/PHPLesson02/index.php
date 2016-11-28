<?php
// Информаци о установленной среде
// ini_set("session.save_path", "/xampp/_temp");
// phpinfo();

// Работа с ошибками и предупреждеиями
// ini_set("display_errors", FALSE);
// error_reporting(E_ALL);

// Переменные
$a = 10;
unset($a);
// Проверка на переменную
if(isset($a)) {
	$b = $a * 2;
	echo "\$b = $b <br />";
} else {
	echo "variable \$a is not set <br />";
}

if(empty("")) {
	echo "&nbsp;string is empty <br />";
}

if(empty($c)) {
	echo "\$c    is undefined or is empty <br />";
}

// Константы
define("HOST", "localhost", true);
//define("HOST", "itstep.dp.ua");

// Проверка констант
if(defined('HOST')) {
	echo "host: " . HOST . "<br />";
}

// альтернативный вариант условного оператора if
if(true): ?>
	<p style="text-align: center">It is true</p>	
<?php elseif (false): ?>
	<p style="text-align: center">It is false</p>
<?php endif; ?>
<ul>
<?php for($i=0; $i<10; $i++):?>
	<li><?php echo $i; ?></li>	
<?php endfor;?>
</ul>

<?php 
// ссылки на переменные
$b = &$a;
$b = 15;
echo "\$a = $a <br/>";

// символьные ссылки

// Фукции, имена функций и чувствительность к регистру

// локальные и глобальные переменные в функциях

// переменное количество аргументов фунцкии

// анонимные функции

// передача функций в виде аргументов
function boo($f) {
	if(is_callable($f)){
	//if(function_exists($f)){
		$f();
	}
}

function foo() {
	echo "foo() <br />";
}

$a = 'b';
$f = 'foo';
$f();
boo('foo');
boo('a');

boo(function(){
	echo "anonimus function <br />";
});

// Библиотеки функций
require_once 'inc/library.php';
echo "add(", 1, ", ", 2, ") = ", add(1, 2), "<br />";

// Массивы. Инициализация массивов
$arr = array( 10 => 1, 2,3,4);

// Начиная с версии 5.4
$arr = [1,2,3,4];

$marr = array(
	0 => array(
		"user" => "Вася",
		"login" => "Vasilij",
		"pass" => "12345"
	),
	"first" => 1
);
//$marr = 10;
echo "<pre>";
if(is_array($marr)) {
	print_r($marr);
}
echo "</pre>";

// Функции массивов
$arr = [1,2,3,4];
require_once 'utils.php';
// Вставка/извлечение элементов с конца
array_push($arr, 10);
print_array($arr);
echo "last: " , array_pop($arr) . "<br />";
print_array($arr);

// Вставка/извлечение элементов с начала
// array_unshift($array, $value1)
// array_shift($array);

// Получение части массива
print_array(array_slice($arr, 1, 2, true));
print_array($arr);

print_array(array_splice($arr, 1, 2, [10, 20]));
print_array($arr);

// Разделение одного массива на несколько
$m = array_chunk($arr, 2, true);
print_array($m[0]);
print_array($m[1]);

// Слияние массивов
print_array(array_merge([0,1,2], [5,6,7]));

// получить только ключ массива
$keys = array_keys($arr);
print_array($keys);
// получить только значения
$values = array_values($arr);
print_array($values);

print_array(array_combine($values, $keys));
print_array(array_flip($arr));

// Обход массива
// function walk_arr($v, $k) {	
// 	echo "arr($k) = $v <br />";			
// }
$n = 20;
array_walk($arr, function ($v, $k, $n) {	
	echo "arr($k) = " . ($v + $n) . " <br />";			
}, $n);

// Рекурсивный обход
$arr = [
	['one' => 1,  2, 3, 4, 5],
	10 => [11,12,13,14,15],
	[21,22,23,24,25]
];
array_walk_recursive($arr, function ($v, $k, $n) {
		echo "rarr($k) = " . ($v + $n) . " <br />";
}, $n);

$students = [ 
		"std6454" => "Вася",
		"std9405" => "Петя",
		"std3685" => "Даша",
		"std7406" => "Саша",
		"std746" => "Саша",
		"std2764" => "Рита",
		"std283" => "Гена" 
];

// Сортировки

// сортировка по возрастанию без сохранения
// ключей
sort($students, SORT_FLAG_CASE | SORT_STRING);
print_array($students);

// сортировка по убыванию без сохранения
// ключей
rsort($students);
print_array($students);

$students = [
		"std6454" => "Вася",
		"std9405" => "Петя",
		"std3685" => "Даша",
		"std7406" => "Саша",
		"std746" => "Саша",
		"std2764" => "Рита",
		"std283" => "Гена"
];

// сортировка по значениям по возрастанию
// с сохранением ключей
asort($students);
print_array($students);

// сортировка по значениям по убыванию
// с сохранением ключей
arsort($students);
print_array($students);

// сортировка по ключам по возрастанию
ksort($students, SORT_STRING | SORT_NATURAL);
print_array($students);

krsort($students, SORT_STRING | SORT_NATURAL);
print_array($students);

$students = array_flip($students);

// естественная сортировка
natsort($students);
print_array($students);

// пользовательская сортировка по значениям
$arr = [110, 1, 2, 62, 3];
usort($arr, function($a, $b){
	return $a - $b;
});
print_array($arr);

// аналогично пользовательская сортировка
// с сохранением ассоциации с ключами
// uasort($array, $value_compare_func)

// ... и по ключам
// uksort($array, $key_compare_func)

$arr = array(
		array("10", 11, 100, 100, "a"),
		array(   1,  2, "2",   3,   1)
);

print_array($arr);

// многомерная сортировка
array_multisort($arr[0], $arr[1]);

print_array($arr);

// перемешивание без сохранения ключей
shuffle($arr);

// Получить колонку 'name' массива $table
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

require_once 'utils.php';



// Без функции array_column
foreach ( $table as $row ) {
	if (array_key_exists ( 'name', $row )) {
		$arr [] = $row ['name'];
	}
}
//print_array ( $arr );
clear_globals ( [ 
		'table' 
] );

// С функцией array_column

clear_globals ();
// -------------------------------------------------------------------------
// Создать массив из переменных $a,$b,...$e
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
print_array ( $arr );

// С функцией compact
$arr2 = compact($a, $b, $c, $d, $e);
print_array ( $arr2 );
clear_globals ();
// -------------------------------------------------------------------------
// Извлекает переменные из массива
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
// Сгенерировать числовой массив 0..9
// Без функции range
clear_globals ();
for($i = 0; $i < 10; $i ++) {
	$arr [] = $i;
}
//print_array ( $arr );

// С функцией range
clear_globals ();

clear_globals ();

// -------------------------------------------------------------------------
// Найти все нечетные значения числового массива
$arr = range ( 0, 10 );
// Без функции array_filter
foreach ( $arr as $k => $v ) {
	if ($v % 2) {
		$odds [$k] = $v;
	}
}
//print_array ( $odds );
clear_globals ( [ 
		'arr' 
] );

// с функцией array_filter

//print_array ( $odds );
clear_globals ();

// -------------------------------------------------------------------------
// Заполнить массив одинаковыми значениями
// Без функции array_fill
for($i = 0; $i < 10; $i ++) {
	$arr [$i] = "value";
}
//print_array ( $arr );
clear_globals ();

// С функцией array_fill

clear_globals ();

// -------------------------------------------------------------------------
// Найти произведение элементов массива
$arr = range ( 1, 10 );

// Без функции array_reduce
$prod = 1;
foreach ( $arr as $v ) {
	$prod = $prod * $v;
}
//print ("\$prod = " . $prod . "<br />") ;
clear_globals ( [ 
		'arr' 
] );

// С функцией array_reduce

clear_globals ();

// -------------------------------------------------------------------------
// Извлечение значений элементов массива в переменные $a, $b, $c
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
clear_globals ( [ 
		'arr' 
] );

// С list

clear_globals ();

// -------------------------------------------------------------------------
// Перебрать элементы ассоциированного массива без ключей
$arr = [ 
		'k1' => 'v1',
		'k2' => 'v2',
		'k3' => 'v3' 
];

// Без функций current (pos), reset, prev, next, end
foreach ( $arr as $value ) {
	//echo "$value <br />";
}

// С функциями current (pos), reset, prev, next, end

// -------------------------------------------------------------------------
// Перебрать элементы ассоциированного массива с ключами
$arr = [ 
		'k1' => 'v1',
		'k2' => 'v2',
		'k3' => 'v3' 
];

// Без функции each
foreach ( $arr as $key => $value ) {
	//echo "$key => $value <br />";
}
		
		// С функциями current (pos), reset, prev, next, end
		
		// Работа с формами
		
		// Суперглобальные переменные $_POST, $_GET, $_REQUEST
		
	
