<h2>Cookies</h2>


<?php

setcookie("cookie", "test", time() + 60, "/", "", false, true);
echo "<pre>";
print_r($_COOKIE);
echo "</pre>";

$r = mt_rand(0, 100);
echo $r . "<br/>";