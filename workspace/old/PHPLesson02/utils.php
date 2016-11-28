<?php 
function print_array($param) {
	if(isset($param) && is_array($param)) {
		print("<pre>");
		print_r($param);
		print("</pre>");
	}
}

function clear_globals($persist=[]) {
	foreach ($GLOBALS as $key => $value) {
		if($key !== strtoupper($key) && 
				!in_array($key, $persist)) {
			unset($GLOBALS[$key]);
		}
	}
}