<?php
if (!empty($_POST) && isset($_POST['password'])) {
    $query = $_POST['password'];
} else {
    $query = "";
}
?>
<form method="post" action="hash.php">
    <label>
        Password
        <input type="text" name="password" value="<?php echo $query ?>"/>
        <input type="submit"/>
    </label>
</form>

<?php
    $salt = 's0lt';
    echo "orig password: ", $query , "<br/>";
    echo "md5 password: ", md5(md5($query.$salt)) , "<br/>";
    $hash = password_hash($query, PASSWORD_DEFAULT);
    echo "hash password: ", $hash , "<br/>";
    echo password_verify($query, $hash) ? "true password" : "wrong password", "<br/>";



