<?php
spl_autoload_register(function($className){
	//echo "register: $className <br />";
	require_once $className.'.php';
});

// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

$app = new MVC\App();						//создаем загрузчик
$controller = $app->createController();		//создаем запрашиваемый контроллер на основе запроса 'controller' в URL
$controller->executeAction();				//выполняем запрос на основе действия 'action' в URL. Методы контроллера возвращает представление View.
