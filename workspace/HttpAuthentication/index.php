<?php	

if(!isset($_SERVER["PHP_AUTH_USER"])) {
	header('WWW-Authenticate: Basic realm="Basic realm"');
	header('HTTP/1.0 401 Unautorized');
	die("Необходима авторизация");
} else {
	if(!strcmp($_SERVER["PHP_AUTH_USER"], 'user') && 
	   !strcmp($_SERVER["PHP_AUTH_PW"], '12345')) {
		echo "<h1>Welcome</h1>";
		echo "<br />";
		echo "<a href='form.php'>Test form</a>";
	} else {		
		unset($_SERVER["PHP_AUTH_USER"]);		
		header('WWW-Authenticate: Basic realm="Basic realm"');
	}
}
	
