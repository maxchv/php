<?php
$db = null;
try {
    $db = new PDO('mysql:host=localhost;dbname=bank', 'root', '12345');
    echo "connected<br/>";

    $db->beginTransaction(); // начать транзакцию
    $db->exec("update account set money=5000 where id=1");
    if(true) {
        //throw new Exception('Awful error');
    }
    $db->commit(); // подтвердить транзакию
} catch (PDOException $ex) {
    if($db != null) {
        $db->rollBack(); // отменить транзакцию
    }
    echo "Error: $ex->getMessage()";
}