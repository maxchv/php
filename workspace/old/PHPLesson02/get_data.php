<?php
	require_once 'utils.php';
	//print_array($_GET);
	//print_array($_POST);
	//print_array($_REQUEST);
	//if(!empty($_GET)) {
// 	if(isset($_GET['user'])) {
// 		echo "Hello " . $_GET['user'] . "<br />";
// 	} else {
// 		echo "Hello " . $_POST['user'] . "<br />";
// 	}
	$count = 0;
	echo "count $count<br />";
// 	if(isset($_REQUEST['user'])) {
// 		$user = $_REQUEST['user'];
// 	}
// 	if(isset($_REQUEST['pass'])) {
// 		$pass = $_REQUEST['pass'];
// 	}

	$user = "max";
	extract($_REQUEST);
	print_array($GLOBALS);
		
	if(!empty($user)) {
		echo "Hello $user: $pass <br />";
	} else {
		header("Location: forms.php");
		//echo ("<script>window.location='forms.php'</script>");
	}