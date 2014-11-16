<meta charset="utf-8">
<?php

	require('imageIpsum.php');

	echo "Halló, Heimir, Gaman að sjá þig hér<br><br>";

	$ipsumHandler = new imageIpsum('./originals', './resized');

	$ipsumHandler->test();

?>