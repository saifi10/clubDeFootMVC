<?php 
$title = "Metre à jour un joueur";
ob_start(); 
?>
<form action="" method="POST" >
	<input type="hidden" value="<?=$joueur['id']?>" />
	<label>Nom : </label>
	<input type="text" name="nom" value="<?=$joueur['nom']?>" /><br />
	<label>Prénom : </label>
	<input type="text" name="prenom" value="<?=$joueur['prenom']?>" /><br />
	<label>Age : </label>
	<input type="text" name="age" value="<?=$joueur['age']?>" /><br />
	<label>adresse : </label>
	<input type="text" name="adresse" value="<?=$joueur['adresse']?>" /><br />
	<label>telephone : </label>
	<input type="text" name="telephone" value="<?=$joueur['telephone']?>" /><br />
	<label>id_categorie : </label>
	<input type="text" name="id_categorie" value="<?=$joueur['id_categorie']?>" /><br />
    <label>date_naissance : </label>
	<input type="text" name="date_naissance" value="<?=$joueur['date_naissance']?>" /><br />
	<input type="submit" value="mettre à jour" />
</form>
<?php $content= ob_get_clean(); ?>
<?php $sidebar = "Modifier le joueur via son formulaire à gauche."; ?>
<?php $customcss="";?>

    