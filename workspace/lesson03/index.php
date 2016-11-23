<?php
/**
 * Занятие # 3
 * Создание web–приложений, исполняемых на стороне сервера при помощи языка
 * программирования PHP,СУБД MySQL и технологии Ajax
 * shaptala@itstep.org
 * 23.11.2016
 */

error_reporting(-1); // отчет об ошибках

// Параметры по умолчанию
function foo($arg = "dummy") {
    if(isset($arg)) { // проверка на наличие переменной
        echo "I got argument $arg <br />";
    } else {
        echo "Argument is empty <br />";
    }
}
foo();
foo("other dummy");

$a = 10;
unset($a); // освобождает память
//echo "$a<br />";

// Локальные и глобальные переменные

$a = 10; // Глобальная облость видимости
function boo($b) {
    // локальная область видимости

    echo "current function: " . __FUNCTION__ . "<br />";
    //global $a; // использование глобальной переменной
    //$a = 20;
    $GLOBALS['a'] = 20;
    //return $a + $b;
    return $GLOBALS['a'] + $b;
}

echo boo(20) . "<br />";
echo $a . "<br />";

echo "<pre>";
//print_r($GLOBALS);
echo "</pre>";

echo $GLOBALS['a'] . "<br />";

echo "current file: " . __FILE__ . "<br />";

// Передача параметров по ссылке и значению
function swap(&$a, &$b) {
    $tmp = $a;
    $a = $b;
    $b = $tmp;
    echo "inside swap: a = $a, b = $b <br />";
}

$aa = 10;
$bb = 20;

echo "before: aa = $aa, bb = $bb <br />";
swap($aa, $bb);
echo "after: aa = $aa, bb = $bb <br />";

// Вызов функций по символьной ссылке
$x = 10;
$y = "x";
$$y = 20;
echo "x = $x <br />";

$y = "z";
$$y = 200;
echo "z = $z <br />";

$func = "swap";
$func($x, $z);
echo "x = $x, z = $z<br />";


function f1() {
    echo "f1() <br/>";
}

function f2() {
    echo "f2() <br/>";
}

function f3() {
    echo "f3() <br/>";
}

function f4() {
    echo "f4() <br/>";
}

for($i=1; $i <=4; $i++) {
    $f = "f$i";
    $f();
}

if(isset($_GET['func'])) {
    $f = $_GET['func'];
    if(function_exists($f)) {
        echo "call function $f<br/>";
        $f();
    }
}

// Переменное кол-во аргументов

// Типизированные аргументы функций

// Строгая типизация

// Типизированный результат

// Анонимные функции