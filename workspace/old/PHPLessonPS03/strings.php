<h2>Strings in PHP</h2>

<?php
	require_once 'utils.php';
	
	$str = "It is a simple string\n";
	$label = "some input ";
	// heredoc
	$form = <<<"EOF"
<form action="#" method="get">
	<label>$label
		<input type="text" name="test" />
	</label>
	<input type="submit" />
</form>
EOF;
	print($form);
		
	// nowdoc (PHP >= 5.3.0)
	$form = <<<'EOF'
<form action="#" method="get">
	<label>$label
		<input type="text" name="test" />
	</label>
	<input type="submit" />
</form>
EOF;
	
	print($form);
	
	// вывод на экран
	// echo
	// print
	// printf
	//printf("%x<br />", 255);
	$x = sprintf("%x<br />", 255);
	echo $x;
	
	// Длинна строки
	$len = strlen($str);
	echo "length of string '".mark($str)."' is: $len <br />"; 
	
	// Подсчет количества слов в строке
	$words = str_word_count($str);
	echo "number of words in string '".mark($str)."' is: $words <br />";
	
	// Преобразование к нижнему регистру
	echo "lowercase: " . mark(strtolower($str)) . "<br />";
	
	// Преобразование к верхнему регистру
	echo "UPPERCASE: " . mark(strtoupper($str)) . "<br />";
	
	// Реверс строки
	echo "Reverse: " . mark(strrev($str)) . "<br />";
		
	// Сравнение строк
	echo "a == a: " . ('a' == 'a' ? 'true' : 'false')."<br />";
	echo "a != a: " . ('a' != 'a' ? 'true' : 'false')."<br />";
	echo "a != b: " . ('a' != 'b' ? 'true' : 'false')."<br />";
	
	echo "strcmp(a, b): " . (strcmp('a', 'b'))."<br />";
	echo "strcmp(a, a): " . (strcmp('a', 'a'))."<br />";
	echo "strcmp(b, a): " . (strcmp('b', 'a'))."<br />";
	
	echo "strcmp(a, A): " . (strcmp('a', 'A'))."<br />";
	
	echo "strcasecmp(a, A): " . (strcasecmp('a', 'A'))."<br />";
	
	echo "'doc105.jpeg' > 'doc20.jpeg': ", ('doc105.jpeg' > 'doc20.jpeg' ? 'true' : 'false') . "<br />";
	echo "'doc105.jpeg' > 'doc20.jpeg': ", strnatcasecmp('doc105.jpeg', 'doc20.jpeg') . "<br />";
	
	echo "я > ё: " . ('я' > 'ё' ? 'true' : 'false') . "<br/>"; 
	
	echo "&#1103 !> &#1105 <br />";
	
	setlocale(LC_COLLATE, "ru");
	echo "strcoll('я', 'ё'): " . strcoll("я", "ё") . "<br />";
	
	// Поиск заданного текста внутри строки
	$from = strpos($str, "simple");
	echo "simle start from: $from <br />";
	
	// Получение подстроки
	echo substr($str, $from, 6) . "<br />";
	
	$email = "username@domain.com";
	// Часть строки
	echo strstr($email, "@") . "<br />";
	echo strstr($email, "@", true) . "<br />";
	echo stristr("file.file.PDF.exe", ".pdf") . "<br />";
	
	$msg = "I love C#<br />";
	// Замена текста
	echo str_replace("C#", "PHP", $msg);
	
	// Повторение строки
	echo str_repeat("-*", 20) . "<br />";
	
	$raw_string = "\t\t      string \t\t     ";
	echo "<pre>$raw_string</pre>";
	// Начальные, конечные пробелы в строке	
	echo "<pre>" . trim($raw_string) . "</pre>\n";
	
	// Удаление всех html и php тегов	
	$danger_str = "<script>alert('do some'); </script>";
	echo strip_tags($danger_str);
	
	$html = "<p><b>text</b></p>";
	echo $html;
	echo strip_tags($html, "<b>") . "<br />";
	
	// Преобразование специальных симовлов
	//$html = "&lt;p&gt;&lt;b&gt;text&lt;/b&gt;&lt;/p&gt;";
	echo "<pre><code>" . htmlentities($html) . "</code></pre>";
	
	// Обратное преобразование в сущности html 
	echo html_entity_decode("&lt;p&gt;&lt;b&gt;text&lt;/b&gt;&lt;/p&gt;");
	
	// Таблица преобразования
	echo "<pre>";
	var_dump(get_html_translation_table());
	echo "</pre>";

		
