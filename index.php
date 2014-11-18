<meta charset="utf-8">
<title>imageIpsum</title>
<?php

	require('imageIpsum.php');

	echo 'imageIpsum';

	// Class initialized
	$ipsumHandler = new imageIpsum('./originals/', './resized/', 'Ballmer');

	// Serve me up some Ballmer
	$ipsumHandler->serve(250, 100);
	$ipsumHandler->serve(250, 110);
	$ipsumHandler->serve(250, 120);
	$ipsumHandler->serve(250, 130);
	$ipsumHandler->serve(250, 140);
	$ipsumHandler->serve(250, 150);
	$ipsumHandler->serve(250, 160);
	$ipsumHandler->serve(250, 170);
	$ipsumHandler->serve(250, 180);
	$ipsumHandler->serve(250, 190);
	$ipsumHandler->serve(250, 200);
	$ipsumHandler->serve(250, 210);
	$ipsumHandler->serve(250, 220);
	$ipsumHandler->serve(250, 230);
	$ipsumHandler->serve(250, 240);
	$ipsumHandler->serve(250, 250);
	$ipsumHandler->serve(250, 260);
	$ipsumHandler->serve(250, 270);
	$ipsumHandler->serve(250, 280);
	$ipsumHandler->serve(250, 290);
	$ipsumHandler->serve(250, 300);
	$ipsumHandler->serve(250, 310);
	$ipsumHandler->serve(250, 320);
	$ipsumHandler->serve(250, 330);
	$ipsumHandler->serve(250, 340);
	$ipsumHandler->serve(250, 350);
	$ipsumHandler->serve(250, 360);
	
?>