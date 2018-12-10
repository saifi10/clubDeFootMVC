<?php 

ini_set('display_errors', 1);
ini_set('log_errors', 1);

include("model/model.php");
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
$joueur = get_joueur_by_id($id);

include("views/updateJoueurForm.php");
include("views/layout.php");