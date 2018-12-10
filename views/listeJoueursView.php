<?php 
  $title = "Liste des joueurs";
?>
<?php ob_start(); ?>
  <h1>Acceuil</h1> 
  <table class="table  table-hover table-bordered">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Voir</th>
        <th>Maj</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach ($joueurs as $result) { ?>

      <tr>
        <td><?=$result['nom_joueur']?></td>
        <td><?=$result['prenom_joueur']?></td>
        <td>
          <a href="detailJoueurController.php?id=<?=$result['ID']?>" >voir le detail</a>
        </td>
        <td>
          <a href="updateFormJoueurController.php?id=<?=$result['ID']?>" >mettre à jour</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>      
  </table>
<?php $content = ob_get_clean(); ?>
<?php $sidebar = "un message specifique de cette page pour la sidebar"; ?>
<?php $customcss="";?>

