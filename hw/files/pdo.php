<!doctype html>
<html>
<head>
    <title>PDO Example</title>
    <meta charset="utf-8"/>
</head>
<body>

<h2>PDO</h2>

<form method="post" role="form" class="form-horizontal">
    <div class="form-group">
        <label class="control-label col-sm-2">Login:</label>
        <div class="col-sm-10">
            <input class="form-control"
                   required="required" type="text"
                   name="login" placeholder="Your login"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Password:</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" required="required" name="password" placeholder="Your password"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">E-mail:</label>
        <div class="col-sm-10">
            <input class="form-control" type="email" name="email" placeholder="Your email"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">First Name:</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="first_name" placeholder="Your First Name"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Last Name:</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="last_name" placeholder="Your Last Name"/>
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
            <input type="date" min="0" max="150" name="date_birth"/>
        </div>
    </div>

    <button type="submit" class="btn btn-default">Register</button>

</form>

<?php
$show = false;
require_once 'sql.php';

define("DBUSER", "webuser");
define("DBPASSWORD", "webpassword");
define("DB", "users");

try {
    // Строка подключения
    //$dsn = "mysql:host=localhost;charset=utf8;dbname=" . DB;
    $dsn = "sqlite:" . DB . ".sqlite";

    // Подключение к б/д
    $db = new PDO($dsn, DBUSER, DBPASSWORD);

    $sql = "CREATE TABLE Users(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    first_name TEXT NOT NULL,
    last_name TEXT NOT NULL,
    login TEXT NOT NULL,
    password TEXT NOT NULL,
    email TEXT NOT NULL,
    gender TEXT NULL,
    date_birth TEXT NULL,
    register_date TEXT);";

    echo "Connected successfully<br/>";

    // Добавление атрибутов
    // При возникновении проблем - генерировать исключения
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //$db->exec($sql);

    // Выполнение простого запроса
    // Запросы без ответа DELETE, CREATE, UPDATE, ALERT, INSERT
    if (!empty($_POST)) {
        extract($_POST);
        $sql = "INSERT INTO users(first_name, last_name, login, password, email, gender, date_birth)
                VALUES ('$first_name', '$last_name', '$login', '$password', '$email', '$gender', '$date_birth')";
        //echo $sql . "<br/>";
        $rows = $db->exec($sql);
    }

    class Row
    {

    }
    $row = new Row();
    $row->id = 1;
    // Запрос с ответом
    // SELECT
    $sql = "select * from users";
    foreach($db->query($sql, PDO::FETCH_CLASS, 'Row') as $row) {
        echo "<pre>";
        var_dump($row);
        echo "</pre>";
        echo $row->id;
        //echo "id = {$row[0]} {$row['id']}<br/>";
    }

    // Подготовленные запросы

    // Параметры
} catch (PDOException $ex) {
    echo "Error: " . $ex->getMessage() . "<br/>";
}
?>
</body>
</html>