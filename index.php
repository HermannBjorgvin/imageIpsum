<?php

	require('imageIpsum.php');

	// Class initialized
	$ipsumHandler = new imageIpsum('./originals/', './resized/', 'Ballmer');
		
	$width = min($_GET['x'], 2000);
	$heigt = min($_GET['y'], 2000);

	// open the file in a binary mode
	$name = $ipsumHandler->serve($width, $heigt);
	$fp = fopen($name, 'rb');

	// send the right headers
	header("Content-Type: image/jpg");
	header("Content-Length: " . filesize($name));

	// dump the picture and stop the script
	fpassthru($fp);
	exit;

?>