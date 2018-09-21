<h2>Функции массивов</h2>
<?php

function head($header) {
    static $num = 1;
    echo "<h3>${num}. $header</h3>";
    $num++;
}

function task($task) {
    echo "<p>$task</p>";
}

// Функции массивов
$arr = [1,2,3,4];

// Вставка/извлечение элементов с конца
head("Вставка/извлечение элементов с конца");

task("Написать функцию <code>push</code> для добавления элементов в конец массива");
/**
 * @param array $arr - исходный массив
 * @param array ...$items - новые элементы массива
 */
function push(array $arr, ...$items) {
    // FIXME: Ваш код
}

task("Написать функцию <code>push</code> для удаления элемента с конеца массива");
/**
 * @param array $arr - исходный массив
 * @return mixed удаленный элемент массива
 */
function pop(array $arr) {
    // FIXME: Ваш код
    return null;
}

// Вставка/извлечение элементов с начала
head("Вставка/извлечение элементов с начала");
task("Написать функцию <code>unshift</code> для добавления элементов в начало массива");
/**
 * @param array $arr - исходный массив
 * @param array ...$items - новые элементы массива
 */
function unshift(array $arr, ...$items) {
    // FIXME: Ваш код
}

task("Написать функцию <code>shift</code> для удаления элемента с конеца массива");
/**
 * @param array $arr - исходный массив
 * @return mixed удаленный элемент массива
 */
function shift(array $arr) {
    // FIXME: Ваш код
    return null;
}

// Получение части массива
head("Получение части массива");
task("Написать функцию <code>slice</code> для получения части массива");
/**
 * @param int $begin - начальный индекс массива (включая)
 * @param int $end - конечный индекс массива (исключая)
 * @return array - подмассив
 */
function slice(int $begin, int $end) {
    // FIXME: Ваш код
    return [];
}

// Разделение одного массива на несколько
head("Разделение одного массива на несколько");
task("Написать функцию <code>chunk</code> для разделения массива на несколько массивов");
/**
 * @param array $arr - одномерный массив
 * @param int $size - максимальный размер массива
 * @return array массив массивов
 */
function chunk(array $arr, int $size) {
    // FIXME: Ваш код
    return [[],[]];
}

// Слияние массивов
head("Слияние массивов");
task("Написать функцию <code>union</code> для слияния нескольких массивов");
/**
 * @param array $arr - одномерный массив
 * @param int $size - максимальный размер массива
 * @return array объединенный массив
 */
function union(array ...$arr) {
    // FIXME: Ваш код
    return [];
}

