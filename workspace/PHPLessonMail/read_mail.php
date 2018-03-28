<h2>Reading Mail</h2>
<?php
$server = "{imap.gmail.com:993/imap/ssl}INBOX";
$user = "maxshaptala@gmail.com";
$pass = "";

function debug($obj) {
	print ("<pre>") ;
	var_dump ( $obj );
	print ("</pre>") ;
}

$inbox = imap_open ( $server, $user, $pass );

debug ( $inbox );

$folders = imap_list ( $inbox, "{imap.gmail.com:993/imap/ssl}", "*" );
debug ( $folders );
echo "<ul>";
foreach ( $folders as $folder ) {
	$folder = mb_convert_encoding(str_replace ( "{imap.gmail.com:993/imap/ssl}", "", $folder ), "UTF-8", "UTF7-IMAP");
	echo '<li><a href="mail.php?folder=' . $folder . '&func=view">' . $folder . '</a></li>';
}
echo "</ul>";

$status = imap_status ( $inbox, $server, SA_ALL );
debug ( $status );

if (! empty ( $status->unseen )) {
	$unseen_mails = imap_search ( $inbox, 'UNSEEN' );
	rsort ( $unseen_mails );
	
	// debug($unseen_mails);
	
	$last = imap_header ( $inbox, $unseen_mails [0] );
	
	debug ( $last );
	
	$structure = imap_fetchstructure ( $inbox, $unseen_mails [0] );
	debug ( $structure );
	
	if (! empty ( $structure->parts )) {
		foreach ( $structure->parts as $idx => $part ) {
			if ($part->subtype == 'PLAIN') {
				$message = imap_fetchbody ( $inbox, $unseen_mails [0], $idx + 1 );
				$encoding = $part->encoding;
				break;
			} else {
				$message = imap_body ( $inbox, $unseen_mails [0] );
				$encoding = $part->encoding;
			}
		}
	} else {
		$message = imap_body ( $inbox, $unseen_mails [0] );
		$encoding = $structure->encoding;
	}
	debug ( $message );
	echo "<pre>";
	/*
	 *
	 * 0 – 7BIT
	 * 1 – 8BIT
	 * 2 – BINARY
	 * 3 – BASE64
	 * 4 – QUOTED-PRINTABLE
	 * 5 – OTHER
	 *
	 */
	switch ($encoding) {
		case 0 :
			echo htmlentities (  $message );
			break;
		case 1 :
			echo htmlentities ( imap_utf8 ( $message ) );
			break;
		case 2 :
			echo htmlentities ( imap_binary ( $message ) );
			break;
		case 3 :
			echo htmlentities ( imap_base64 ( $message ) );
			break;
		case 4 :
			echo htmlentities ( imap_qprint ( $message ) );
			break;
	}
	echo "</pre>";
}

// $headers = imap_headers($inbox);
// $last_num = imap_num_msg($inbox);

// debug($last_num);

// $last = imap_header($inbox, $last_num);

// debug($last);

// $body = imap_body($inbox, $last_num);

// debug($body);

imap_close ( $inbox );