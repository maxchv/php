<?php 
//header('Content-type: text/html; charset=utf8');
// cities.php?city=Дне
if($request = filter_input(INPUT_GET, 'city', FILTER_SANITIZE_STRING)) {
	$cities = array_filter(file('cities.txt'), function($city) use ($request) {
		return preg_match("/^$request/i", $city);
	});
	array_walk($cities, function(&$city){
		$city = preg_split('/\s—\s/', $city);
	});
// 	echo "<pre>";
// 	print_r($cities);
// 	echo "</pre>";
	
// 	echo "<pre>";
	http_response_code(200);
	//header("Content-type: application/json");
	echo json_encode($cities);
// 	echo "</pre>";
}