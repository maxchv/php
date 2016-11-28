<h2>PDO</h2>

<form method="post" role="form" class="form-horizontal">
	<div class="form-group">
		<label class="control-label col-sm-2">Login:</label>
		<div class="col-sm-10">
			<input class="form-control" required="required" type="text" name="login" placeholder="Your login" />
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">Password:</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" required="required" name="password" placeholder="Your password" />
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">E-mail:</label>
		<div class="col-sm-10">
			<input class="form-control" type="email" name="email" placeholder="Your email" />
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">First Name:</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="first_name" placeholder="Your First Name" />
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">Last Name:</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="first_name" placeholder="Your Last Name" />
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">Gender:</label>
		<div class="col-sm-10">
			<select class="form-control" type="text" name="gender">
				<option>Male</option>
				<option>Female</option>
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-sm-2">Birth:</label>
		<div class="col-sm-10">
			<input type="date" min="0" max="150" name="age"/>
		</div>
	</div>
	
	<button type="submit" class="btn btn-default">Try It</button>
	
</form>
<?php 
$show = false;
require_once 'sql.php';
try{
	// Подключение к б/д
	$db = new PDO("mysql:host=localhost;dbname=users", 'webuser', 'qwerty');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "success";	
	$db->exec($sql['create db']);
	//$db->exec($sql['create table']);
	$db->exec('use users');
	//$db->exec($sql['alter table']);
	// Выполнение простого запроса
	if(isset($_REQUEST['login'])) {
		$login = $_REQUEST['login'];
		$pass = $_REQUEST['password'];
		$email = $_REQUEST['email'];
		
		$db->exec("insert into user(login, password, email) values ('$login', '$pass', '$email')");
	}

	// Запрос с ответом
	foreach($db->query('select * from user') as $row) {
		info($row);
		info('id: %m%', $row[0]);
	}

	// Подготовленные запросы

	// Параметры

} catch(PDOException $ex) {
	echo $ex->getMessage();
}