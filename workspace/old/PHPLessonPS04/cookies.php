<h2>Cookies</h2>

<?php

// чтение
if(isset($_COOKIE['count'])) {
	$count = (int)$_COOKIE['count'];	
} else {
	$count = 0;
}
++$count;

info('Count: %m%', $count);

// создание
//setcookie('count', $count);

// настройки
setcookie('count', $count, time() + 60*60*24*365, null, null, false, true);
	
// удаление
$form = <<<EOF
<form role="form" onsubmit="return false;" class="form-horizontal">
	<button class="form-control btn btn-default" 
	        onclick="document.cookie='count=$count; expires='+(new Date(0)).toUTCString();">Clear Cookies</button>
</form>
EOF;
 
echo $form;
//setcookie('count', 5, time() - 1000);
//setcookie('count', 6, time() - 1000, '/');
//setcookie('count', $count, time() -1000, '/', null, false);

// работа с массивами и объектами в cookies

$user = [
	'login' => 'admin',
	'password' => '12345'
];

$str = serialize($user);
info("serialize: " . $str);
$copy = unserialize($str);
info($copy);

info($_COOKIE);


