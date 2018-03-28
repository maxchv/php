<h2>Zeta Components</h2>

<?php 

	// https://github.com/zetacomponents
	require_once 'ezcomponents/Base/src/base.php';
	
	spl_autoload_register(array( 'ezcBase', 'autoload' ));
	
	$msg = new ezcMailComposer();
	$msg->from = new ezcMailAddress("maxshaptala@gmail.com");
	$msg->addTo(new ezcMailAddress("maxshaptala@gmail.com"));
	$msg->subject = "test ezc mail";
	$body = "it is content";
	$msg->plainText = $body;
	$msg->addFileAttachment("index.php", 'text',' php');
	$msg->build();
	
	$host = "smtp.gmail.com";
	$username = "maxshaptala@gmail.com";
	$password = "";
	$port = 587;
	
	$smtpOpt = new ezcMailSmtpTransportOptions();
	$smtpOpt->preferredAuthMethod = ezcMailSmtpTransport::AUTH_LOGIN;
	
	$smtp = new ezcMailMtaTransport(); // new ezcMailTransportSmtp($host, $username, $password, $port, $smtpOpt);
	$smtp->send($msg);
	
	

	
	
	