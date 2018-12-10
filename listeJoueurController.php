<?php

ini_set('display_errors', 1);
// Enregistrer les erreurs dans un fichier de log
ini_set('log_errors', 1);
	//0./ charge autoload.php
	include "vendor/autoload.php";

	//1./ se met en lien avec le modèle 
	include "model/model.php";

	$allComment=null;

	if(isset($_POST['commentaire']) && !empty($_POST['commentaire']) && isset($_POST['saison'])) 
	{
		//$p_commentaire = filter_var($_POST['commentaire'], FILTER_SANITIZE_STRING);
		$p_commentaire = $_POST['commentaire'];
		$p_saison = filter_var($_POST['saison'], FILTER_SANITIZE_STRING);

		$allComment = get_commentaire($p_saison ,$p_commentaire); 
		print_r($allComment);
	}


	//2. récupérer auprès du model les donnée dont il peut y avoir besoin. 
	$joueurs = get_all_joueurs(); // get_all_joueur() est dans model.php
	$categories = get_all_categories(); 

	//3./ J'appel la bonne vue pour présenter les résultats. 
	include "views/listeJoueursView.php";
	include("views/layout.php");
