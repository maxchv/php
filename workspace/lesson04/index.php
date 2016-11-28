<?php
/**
 * Занятие # 4
 * Создание web–приложений, исполняемых на стороне сервера при помощи языка
 * программирования PHP,СУБД MySQL и технологии Ajax
 * shaptala@itstep.org
 * 24.11.2016
 */
//declare(strict_types=1);
error_reporting(-1); // отчет об ошибках

include "header.html";
include_once "header.html";
include_once "header.html";

// Переменное кол-во аргументов
function summ()
{
    echo "num args: " . func_num_args() . "<br/>";
    $sum = 0;
    $args = func_get_args();
    foreach ($args as $arg) {
        $sum += $arg;
    }
    return $sum;
}

print "sum(1,2,3) = " . summ(1, 2, 3) . "<br/>";
// c 5.6
function mult(...$args)
{
    $p = 1;
    foreach ($args as $arg) {
        $p *= $arg;
    }
    return $p;
}

echo "product (1,2,3) = ", mult(1, 2, 3), "<br/>";

// Типизированные аргументы функций
// array, callable, class, interface, self
// bool, int, float, string
class Foo
{

}

function print_only_foo(Foo $foo) {

}

print_only_foo(new Foo());

function print_array(array $arr, $offset = " ")
{
    echo "<pre>";
    foreach ($arr as $key => $item) {
        if (is_array($item)) {
            print("$key=>");
            print_array($item, "    ");
        } else {
            echo "$offset$key => $item\n";
        }
    }
    echo "</pre>";
}

$a = [
    "One", "Two", "Three",
    "key" => [
        "11", "22", "33"
    ]
];
print_array($a);

//print_array("test");

// Строгая типизация
function add_two(float $a, float $b): float
{
    echo "Inside " . __FUNCTION__ . "<br/>";
    echo "type \$a is " . gettype($a) . "<br/>";
    echo "type \$b is " . gettype($b) . "<br/>";
    echo "<hr>";
    return $a + $b;
    //return "lajl";
}

echo "add_two(1.5, 2.5) = " . add_two(1.5, 2.5) . "<br />";
$a = 1;
$b = 2;
echo "type \$a is " . gettype($a) . "<br/>";
echo "type \$b is " . gettype($b) . "<br/>";
echo "add_two(1, 2) = " . add_two($a, $b) . "<br />";

$a = "1";
$b = "2";
echo "type \$a is " . gettype($a) . "<br/>";
echo "type \$b is " . gettype($b) . "<br/>";
echo "add_two(1, 2) = " . add_two($a, $b) . "<br />";

// Типизированный результат
// php 7.x
function foo(): string
{
    return "only string";
}

echo foo();

// Анонимные функции
$foo = function ($arg) {
    echo "anonymous function with argument $arg<br/>";
};

$foo("some argument");

include "cats.php";
include_once "cats.php";

$cats = [
    new Cat("Барсик", 2),
    new Cat("Мурчик", 1)
];


if (compare_cats($cats, function (Cat $c1, Cat $c2) {
    return $c1->getAge() > $c2->getAge();
})) {
    echo "Cat " . $cats[0]->getName() . " is older than " . $cats[1]->getName() . "<br/>";
}
