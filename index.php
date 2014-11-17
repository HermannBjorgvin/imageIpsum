<meta charset="utf-8">
<title>imageIpsum</title>
<?php

	require('imageIpsum.php');

	echo "Halló, Heimir<br><br>";

	// Class initialized
	$ipsumHandler = new imageIpsum('./originals/', './resized/');

	// Test to confirm directories
	$ipsumHandler->test();

	echo '<br>';

	// Serve me up some Ballmer
	$ipsumHandler->serve(349, 116);
	$ipsumHandler->serve(349, 156);
	$ipsumHandler->serve(349, 466);
	$ipsumHandler->serve(624, 800);
	$ipsumHandler->serve(1920, 1080);
	$ipsumHandler->serve(1080, 1920);

?>