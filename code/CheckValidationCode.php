<?php
	session_start();
	$vc = $_GET["vc"];
	$vn = $_SESSION["ValidationNum"];
	
	if ($vc == $vn)
		print "yes";
	else
		print "no";
?>