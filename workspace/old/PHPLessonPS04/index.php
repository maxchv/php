<?php //header("Refresh: 15;url={$_SERVER['REQUEST_URI']}"); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PHP Lesson #04</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.css" />
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
					<a href="index.php" class="navbar-brand"></a>
				</div>
				<div class="collapse navbar-collapse" id="mainMenu">
					<ul class="nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<li><a href="index.php?q=cookies">Cookies</a></li>
						<li><a href="index.php?q=sessions">Sessions</a></li>
						<li><a href="index.php?q=mysql">MySQL</a></li>
						<li><a href="index.php?q=pdo">PDO</a></li>
						<li><a href="index.php?q=oop">OOP</a></li>
						<li><a href="index.php?q=ajax">AJAX</a></li>
					</ul>
				</div>
			</div>
		</nav>
		
		<div class="container">
			<div class="jumbotron">
				<h1></h1>
				<p></p>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<?php 
						require_once 'utils.php';
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
				// set active menu item
				var whref = window.location.href;
				var href = whref.slice(whref.lastIndexOf('/')+1);
				$("a[href='"+href+"']").parent().addClass('active');

				// set titles
				var title = $('title').text();
				$('.navbar-header>a').text(title);
				$('h1').text(title);

				var subj = [];
				$('.navbar-nav a').each(function(){
					if($(this).text() !== 'Home') {
						subj.push($(this).text());
					}
				});
				
				$('.jumbotron p').text(subj.join(', '));
				
			})();

			
		</script>
	</body>
</html>