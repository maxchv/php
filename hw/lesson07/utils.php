<?php

function mark($str) {
	return "<mark>$str</mark>";
}

function info($text, $marked="", $pattern="%m%") {
    echo "<pre>";

    if(is_array($text)) {
        print_r($text);
    } else if(is_string($text)) {
        if(!is_array($marked)) {
            echo preg_replace("/$pattern/", "<mark>".$marked."</mark>", $text);
        } else if(is_array($marked)) {
            echo preg_replace_callback("/$pattern/", function() use ($marked){
                return "<mark>". print_r($marked, true) . "</mark>";
            }, $text);
        }
    }
    echo "</pre>";
}

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