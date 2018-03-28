<!DOCTYPE html>
<html>
<head>
	<title>Simple form</title>
	<meta charset="utf-8" />
	 <style>
		form {
		  position: relative;
		  border: 1px solid;
		  padding: 10px;
		  width: 300px;
		  height: 100px;
		  border-radius: 10px;
		  box-shadow: 10px -10px 20px gray;
		  margin: 10px auto;
		}
		input, label {
		  margin-top: 10px;
		  display: inline-block;
		}
		label {
		  width: 100px;
		}
		input[type=submit] {
		  position: absolute;
		  bottom: 10px;
		  right: 20px;
		}
		input {
		  border-radius: 5px;
		}
		h1 {
		  text-align: center;
		}
  </style>
</head>
<?php if(!isset($_REQUEST['user'])):?>
<form method="post" action="#">
	<label for="user">User</label>
		<input type="text" id="user" name="user" placeholder="Username" required />
	
	<label for="pass">Password</label>
		<input id="pass" type="password" name="pass" placeholder="Password" required />
	
	<input type="submit" value="Ok" />
</form>
<?php elseif(!strcmp($_REQUEST['user'], "user") && !strcmp($_REQUEST['pass'], '12345')): ?>
	<h1>Welcome</h1>
<?php endif;?>