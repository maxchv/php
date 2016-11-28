<?php
// Создание сессии
session_start(); 
?>

<h2>Sessions</h2>

<?php

// if(!isset($_COOKIE['rand'])) {
// 	$rnd = mt_rand(0, 100);
// 	setcookie('rand', $rnd);
// } else {
// 	$rnd = (int)$_COOKIE['rand'];
// }

if(!isset($_SESSION['rand'])) {
	// Запись данных
	$rnd = mt_rand(0, 100);
	$_SESSION['rand'] = $rnd;
	//$_SESSION['expire'] = time() + 30;
} else {
	// Считывание данных
	$rnd = $_SESSION['rand'];
}

info($_SESSION);

echo "<h3>Угадайте число (от 0 до 100)</h3>";

if(isset($_REQUEST['guess'])) {
	$guess = (int) $_REQUEST['guess'];
	if($guess < $rnd) {
		echo "<p class='text-warning'>Загаданное число больше</p>";
	} else if($guess > $rnd) {
		echo "<p class='text-warning'>Загаданное число меньше</p>";
	} else {
		echo "<p class='text-success'>Число отгадано</p>";
		setcookie('rand', $_COOKIE['rand'], time()-3600);
	}
} else {
	$guess = 0;
}

$form = <<<EOF
<form action="{$_SERVER['REQUEST_URI']}" method="post" role="form" class="form-horizontal">
	<div class="form-group">
		<label class="control-label col-xs-3 col-sm-2" for="guess">Ваш вариант</label>
		<div class="col-xs-7 col-sm-8">
			<input value='$guess' type="number" min=0 max=100 id="guess" name="guess" class="form-control"/>
		</div>
		<div class="col-xs-2 col-sm-2">
			<input value="Угадать" type="submit" class="btn btn-default" />
		</div>
	</div>
</form>
EOF;

echo $form;

// Информация о сессии
info("session id: %m%", session_id());
info("session name: %m%", session_name());

$user = [
	'login' => 'admin',
	'password' => '12345'
];
$_SESSION['user'] = $user;  

// if($_SESSION['expire'] < time()) {
// 	session_regenerate_id(true);
// }

// Удаление сессии
// session_destroy();

// Удаление cookies
// setcookie(session_name(), session_id(), 0, '/');

