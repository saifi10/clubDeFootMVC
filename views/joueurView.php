<?php $title = "Détail d'un des joueurs"; ?>
<?php ob_start(); ?>
  Le contenu spécifique <?php print_r($joueur); ?>
<?php $content = ob_get_clean(); ?>
<?php $sidebar = "un autre message"; ?>
<?php $customcss="";?>