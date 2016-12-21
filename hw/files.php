<h2>Files and Directories</h2>
<?php
		
// Получение информации о файле
///////////////////////////////

echo "Current file " . __FILE__ . "<br/>";
echo "Current directory: " . __DIR__ . "<br/>";

// Проверить наличие указанного файла или каталога
echo file_exists("index.php") ? "exists" : "is not present";
echo "<br />";
// Проверить это файл или директория
if(is_file("index.php")) {
    echo "file index.php exists <br />";
}

//is_dir(...)

// Получить размер файла
echo "file size: " . filesize(__FILE__) . "<br/>";

// Получить время последнего доступа к файлу
echo "last access : " . date("d/m/Y H:i:s", fileatime(__FILE__)) . "<br/>";

// Получить время последней модификации файла
echo "last modification : " . date("d/m/Y H:i:s", filemtime(__FILE__)) . "<br/>";

// Доступен ли файл для чтения
if(is_readable("data.txt")) {
    echo "I can read file index.php<br/>";
}

// Доступен ли файл для записи
if(is_writable("data.txt")) {
    echo "I can write to file index.php<br/>";
}

// Отркытие файла в режиме чтение, записи, добавления
$f = fopen("file.txt", "r");

// Функции чтения данных из файла
/////////////////////////////////

// Чтение строки
echo fgets($f) . "<br/>";

// Чтение заданного количества байт
echo fread($f, 5) . "<br/>";

// Чтение символа
echo fgetc($f) . "<br/>";

// Чтение с текущей позиции до конца файла и вывести в поток вывода
fpassthru($f);

// Функции записи в файл
////////////////////////
// Запись строки
//fputs($f, "Hello World");
//fprintf()
//fwrite()

// Перемещение курсора в открытом файле
fseek($f, 5, SEEK_SET);

// Получение текущего курсора 
echo "current position: " . ftell($f) . "<br/>";

// Проверка достижения конца файла 
if(!feof($f)) {
    fpassthru($f);
}

// Закытие файла
fclose($f);

// Прямая работа с файлами
//////////////////////////

// Чтение файла и запись в стандартный поток вывода
readfile("file.txt");

// Считывание файла в виде массива строк
echo "<pre>";
print_r(file("file.txt"));
echo "</pre>";

// Запись в файл (file_put_contents)
file_put_contents("file.txt", date("d/m/Y H:i:s") . "\n\r", FILE_APPEND);

// Считывание из файла (file_get_contents)


// Управление файлами
/////////////////////

echo file_exists("result.txt") ? "exists" : "not exists";
echo "<br/>";
// Копирование файлов
copy("file.txt", "result.txt");

echo file_exists("result.txt") ? "exists" : "not exists";
echo "<br/>";

// Переименование файлов
rename("result.txt", "r.txt");

// Удаление файлов
echo file_exists("r.txt") ? "exists" : "not exists";
echo "<br/>";

function delete($f) {
    unlink($f);
}

unlink("r.txt"); // удаление файла

// Работа с директориями
////////////////////////

// Создание
if(!is_dir("uploads")) {
    mkdir("uploads");
}

// Удаление
if(is_dir("uploads")) {
    rmdir("uploads");
}

// Получение текущей директории
$cur_dir = getcwd(); // get current work directory
echo "cwd: $cur_dir<br/>";

// Перемещение по файловой системе
//chdir('c:\\');
$cur_dir = getcwd();
echo "cwd: $cur_dir<br/>";

// Поиск файлов и папок
///////////////////////

echo "FILE: " . __FILE__ . "<br/>";
echo "LINE: " . __LINE__ . "<br/>";
echo "DIR: " . __DIR__ . "<br/>";

// Открыть папку
$dh = opendir("c:\\xampp"); // текущая директория

echo (1 == true) ? "1 == true" : "1 != true";
echo "<br/>";
echo (1 === true) ? "1 === true" : "1 !== true";
echo "<br/>";

// Считать содержимое
while (false !==($f = readdir($dh))) {
    if(is_dir($f)) {
        echo "[DIR] $f<br/>";
    }
    if(is_file($f)) {
        echo filesize($f) . " " . $f . "<br/>";
    }
}
rewinddir($dh);
// Закрыть папку
closedir($dh);



// Сканирование папки
chdir(__DIR__);
foreach (scandir('.') as $f) {
    if(is_dir($f)) {
        echo "[DIR] $f<br/>";
    }
    if(is_file($f)) {
        echo filesize($f) . " <a href='$f'>" . $f . "</a><br/>";
    }
}
echo "<hr/>";
// Поиск по шаблону
foreach(glob("*.txt") as $txt) {
    echo "text file $txt <br/>";
}

