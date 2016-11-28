<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PHP Lesson #03</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="with=device-with, initial-scale=1" />
		<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.css" />
		<style type="text/css">
			mark {
				background-color: yellow;
			}
		</style>
	</head>
	<body>
	
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainMenu">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="index.php" class="navbar-brand">
						PHP Lesson #03
					</a>
				</div>
				<div class="collapse navbar-collapse" id="mainMenu">
					<ul class="nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<li><a href="index.php?q=strings">Strings</a></li>
						<li><a href="index.php?q=regexp">Regular expressions</a></li>
						<li><a href="index.php?q=files">Files &amp; Directories</a></li>
						<li><a href="index.php?q=upload">Upload files</a></li>
						<li><a href="index.php?q=coockies">Coockies</a></li>
						<li><a href="index.php?q=sessions">Sessions</a></li>
					</ul>
				</div>
			</div>
		</nav>
		
		<div class="container">
			<div class="jumbotron">
				<h1>PHP Lesson 03</h1>
				<p>Strings, RegExps, Files and Directories, Coockies, Sessions</p>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<?php 
						if($q = filter_input(INPUT_GET, "q")) {
							$fname = $q . ".php";
							if(file_exists($fname)) {
								require_once $fname;
							}
						}
					?>
				</div>
			</div>			
		</div>
	
		<script src="libs/jquery/jquery.min.js"></script>
		<script src="libs/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript">
			$('.nav a').click(function() {
				$('.nav').find('.active').removeClass('active');
				$(this).parent().addClass('active');
			});

			(function() {
				var whref = window.location.href;
				var href = whref.slice(whref.lastIndexOf('/')+1);
				$("a[href='"+href+"']").parent().addClass('active');
			})();
			
		</script>
	</body>
</html>