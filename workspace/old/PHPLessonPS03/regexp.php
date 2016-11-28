<h2>RegExp</h2>

<?php
require_once 'utils.php';

$email = 'some text mail@gmail.com other text otheremail@mail.com';
$pattern = '/(\w+)@(\w+\.\w+)/';
if(preg_match_all($pattern, $email, $res)) {
	echo "email is valid <br />";
	echo "<pre>";
	print_r($res);
	echo "</pre>";
	echo "username: " . $res[1][0] . "<br />";
} else {
	echo "email is not valid <br />";
}

$data = <<<EOD
key1 = value1
key2 = value2
key3 = value3
EOD;
echo "<pre>";
print_r(preg_split("/[=\n]/", $data));
echo "</pre>";

$raw_str = "some  text     \t\t      some text";
echo "<pre>";
echo $raw_str;
echo "</pre>";

echo "<pre>";
echo preg_replace('/\s+/', ' ', $raw_str);;
echo "</pre>";

