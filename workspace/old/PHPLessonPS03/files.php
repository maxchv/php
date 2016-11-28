<h2>Files and Directories</h2>
<?php
		
// Получение информации о файле
///////////////////////////////

echo "current dir is: " . __DIR__ . "<br />";
echo "current file is: " . __FILE__ . "<br />";

// Проверить наличие указанного файла или каталога
if(file_exists("index.php")) {
	echo "file or folder exists <br />";
} else {
	echo "file or folder not exists <br />";
}

// Проверить это файл или директория
if(is_file("index.php")) {
	echo "file exists <br />";
} else {
	echo "file not exists <br />";
}

if(is_dir("libs")) {
	echo "folder exists <br />";
}

// Получить размер файла
echo "current file has size:  ". filesize(__FILE__) . "<br />" ;

// Получить время последнего доступа к файлу
echo date("m-d-Y H:i:s", fileatime(__FILE__)) . " <br />";

// Получить время последней модификации файла
echo date("m-d-Y H:i:s", filemtime(__FILE__)) . " <br />";

// Доступен ли файл для чтения
echo "can i read: " . (is_readable('test.txt') ? "true" : "false") . "<br />";

// Доступен ли файл для записи
echo "can i write: " . (is_writable('test.txt') ? "true" : "false") . "<br />";

// Отркытие файла в режиме чтение, записи, добавления
$fh = fopen("data.txt", "r+");

// Функции чтения данных из файла
/////////////////////////////////

// Чтение строки
echo fgets($fh) . "<br />";

fseek($fh, 0, SEEK_SET);
// Чтение заданного количества байт
echo fread($fh, 5);

// Чтение символа
echo fgetc($fh);

// Чтение с текущей позиции до конца файла и вывести в поток вывода
fpassthru($fh);

// Функции записи в файл
////////////////////////
// Запись строки
//fwrite($fh, "hello file\n");
// Перемещение курсора в открытом файле
fseek($fh, 0, SEEK_SET);
// Получение текущего курсора 
echo "current position: " . ftell($fh) . "<br />";

// Проверка достижения конца файла 
if(feof($fh)) {
	echo "end of file <br/>";
}

// Закытие файла
fclose($fh);

// Прямая работа с файлами
//////////////////////////

// Чтение файла и запись в стандартный поток вывода
readfile('data.txt');

// Считывание файла в виде массива строк
$strings = file('data.txt');
echo "<pre>";
print_r($strings);
echo "</pre>";

// Запись в файл (file_put_contents)
//file_put_contents("data.txt", "new data", FILE_APPEND);

// Считывание из файла (file_get_contents)
$str = file_get_contents("data.txt");
echo nl2br($str) . "<br />";

// Управление файлами
/////////////////////

// Копирование файлов
copy('data.txt', "dest.txt");

// Переименование файлов
rename("dest.txt", "new_data.txt");

// Удаление файлов
unlink("new_data.txt");

// Работа с директориями
////////////////////////

// Создание
if(!is_dir('uploads')) {
	mkdir("uploads");
}

// Удаление
//rmdir($dirname)

// Получение текущей директории
$cur_dir = getcwd();
echo "current folder: $cur_dir <br />"; 

// Перемещение по файловой системе
//chdir('c:\\');
$cur_dir = getcwd();
echo "current folder: $cur_dir <br />";

// Поиск файлов и папок
///////////////////////

// Открыть папку
$dh = opendir(__DIR__);

//echo "<pre>";
echo "<ul>";
// Считать содержимое
while($f = readdir($dh)) {
	//echo $f , is_dir($f) ? "\t&lt;DIR&gt;" : "\t" . filesize($f) , "<br />";
	if(is_file($f)) {
		echo "<li><a href='$f'>$f</a></li>";
	}
}
//echo "</pre>";
echo "</ul>";

// Закрыть папку
closedir($dh);

echo "<pre>";
// Сканирование папки
foreach(scandir("c:\\") as $name) {
	echo "$name <br />";
}
echo "</pre>";

echo "<pre>";
// Поиск по шаблону
foreach(glob("c:\\*.bat") as $name) {
	echo "$name <br/>";
}
echo "</pre>";


