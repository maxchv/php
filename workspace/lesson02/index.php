<h1>Занятие 2</h1>
<?php
/**
 * Занятие #2
 * Создание web–приложений, исполняемых на стороне сервера при помощи языка
 * программирования PHP, СУБД MySQL и технологии Ajax
 * shaptala@itstep.org
 * 22.11.2016
 */

for ($i = 0; $i < 2; $i++) {
    echo "item $i<br />";
}

for ($i = 0; $i < 2; $i++):
    echo "alternative item $i <br />";
endfor;

$is_authenticated = false;
?>

<?php if ($is_authenticated): ?>
    <p style="color: darkgreen">Welcome Home!</p>
<?php else: ?>
    <p style="color: red">You are anonymous</p>
<?php endif; ?>

<?php
// casting
$a = 5;
echo "type: " . gettype($a) . "<br/>";
$a = (string)5; // C style
echo "type: " . gettype($a) . "<br/>";
settype($a, "float");
echo "type: " . gettype($a) . "<br/>";
$a = "35 px" + "57 px";
//settype($a, "float");
echo "$a type: " . gettype($a) . "<br/>";
?>

<?php
//$arr = array();
$arr[10] = "bear";
$arr[15] = "peach";
$arr[20] = "vine";
$arr[25] = "sidr";
$arr["one hundred"] = 100;

//echo "<ul>";
//for ($i = 0; $i < count($arr); $i++) {
//    echo "<li>$arr[$i]</li>";
//}
//echo "</ul>";
echo "<pre>";
print_r($arr);
echo "</pre>";
echo "<ul>";
foreach ($arr as $key => $value) {
    echo "<li>$key => $value</li>";
}
echo "</ul>";

// initialization
$user = [
    "login" => "admin",
    "pass"  => "qwerty",
    "email" => "admin@mail.com",
    "is_superuser" => true,
    "permission" => [
        "can_write" => true,
        'can_read' => true,
        'can_delete' => true
    ]
];
echo "<pre>";
print_r($user);
echo "</pre>";

echo "can write? " . ($user["permission"]["can_write"] ? "true" : "false");
echo "<br />";

if($is_authenticated) {
    function foo($arg) {
        echo "It is simple function foo with argument $arg";
    }
}

foo("test");
