<?php
	ini_set('display_errors', 1);
	ini_set('log_errors', 1);
	
	//1./ pour pouvoir utiliser le model il faut le "connaitre"
	include("model/model.php");

	//2./ analayser l'url, est ce que la demande est formuler correctement ?
	$joueur ="lalala"; 

	include("views/joueurView.php");
	include("views/layout.php");
		