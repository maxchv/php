<?php
if (!empty($_POST) && isset($_POST['query'])) {
    $query = $_POST['query'];
} else {
    $query = "";
}
?>
    <form method="post" action="sequirity.php">
        <label>
            Search
            <input type="search" name="query" value="<?php echo $query ?>"/>
            <input type="submit"/>
        </label>
    </form>

<?php

try {
    if (!empty($_POST) && isset($_POST['query'])) {

        $db = new PDO("mysql:host=localhost;dbname=users", "root", '12345');
        echo "connected";
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $_POST['query'];
        echo "htmltities: " . htmlspecialchars($query) . "<br/>";
        $sql = "select * from users where first_name like '%$query%'";
        echo "sql: $sql<br/>";
        echo "<table border='1' cellspacing='0'>";
        echo "<tr>";
        echo "<th> id </th>";
        echo "<th> First name </th>";
        echo "<th> Last name </th>";
        echo "<th> Login </th>";
        echo "<th> email </th>";
        echo "</tr>";
        $q = $db->prepare("select * from users where first_name like :query");
        //$q->execute(array('query' => $query));
        //$q->bindValue('query', $query);
        $q->bindParam('query', $query);
        $query = "Jack";
        $queries = ['Jack', "Mila", 'test'];
        foreach ($queries as $name) {
            //$q->bindValue('query', $name);
            $query = $name;
            $q->execute();
        }
        $q->execute();
        foreach ($q->fetchAll() as $row) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['login'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }

//        foreach($db->query($sql) as $row) {
//            echo "<tr>";
//            echo "<td>" . $row['id'] . "</td>";
//            echo "<td>" . $row['first_name'] . "</td>";
//            echo "<td>" . $row['last_name'] . "</td>";
//            echo "<td>" . $row['login'] . "</td>";
//            echo "<td>" . $row['email'] . "</td>";
//            echo "</tr>";
//        }
        echo "</table>";
    }

} catch (PDOException $ex) {
    echo "Error: $ex->getMessage()<br/>";
}


