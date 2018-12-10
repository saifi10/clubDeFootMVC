<?php


	function connectDB() {
		$username = "saifi";
    	$password = "tartuffe";
    	$pdo = new PDO("mysql:host=localhost;dbname=mydb", $username, $password);
        return $pdo; 
	}
	function get_all_joueurs() {
		//1./ elle se conecte a la base de données
    	$pdo = connectDB();
            
		//2. elle récupèré tout les joueurs
    	 $sql = "SELECT DISTINCT joueur.id AS ID, entraineur.nom AS nom_entraineur, joueur.nom AS nom_joueur, joueur.prenom AS prenom_joueur, saison.nom AS saison 
			 FROM joueur
			 INNER JOIN jsc ON jsc.id_joueur = joueur.id
			 INNER JOIN  categorie ON jsc.id_categorie = categorie.id
			 INNER JOIN  saison ON jsc.id_saison = saison.id
			 INNER JOIN  esc ON jsc.id_saison = esc.id_saison
			 INNER JOIN  entraineur ON entraineur.id = esc.id_entraineur";

		$stmnt = $pdo->prepare($sql);
		//execution du statement
		$stmnt->execute();
		//Récupérer les données 
		$results = $stmnt->fetchAll(); 
		$stmnt->closeCursor();
		//3. elle renvoi les résultats 
		return $results;
	}

	function get_joueur_by_id($id) {

		$pdo = connectDB();
        $sql = "SELECT * FROM joueur where id = :id;";
		$stmnt = $pdo->prepare($sql);
		$stmnt->bindValue(":id", $id, FILTER_VALIDATE_INT);
		$stmnt->execute();
		$joueur = $stmnt->fetch(); 
		$stmnt->closeCursor();
		return $joueur;
	}

	function get_all_categories() {
		//1./ elle se conecte a la base de données
    	$pdo = connectDB();
            
		//2. elle récupèré tout les joueurs
    	 $sql = "SELECT * from categorie;";

		$stmnt = $pdo->prepare($sql);
		//execution du statement
		$stmnt->execute();
		//Récupérer les données 
		$results = $stmnt->fetchAll(); 
		$stmnt->closeCursor();
		//3. elle renvoi les résultats 
		return $results;

	}

	function get_commentaire($saison,$motcle) {

		$pdo =connectDB();
		
	/*	$sql= "SELECT commentaire, id_saison FROM
				commentaire INNER JOIN  jsp ON commentaire.id_jsp= jsp.id_jsp
				inner join saison on  jsp.id_saison = saison.id
				WHERE commentaire like '%:motrecherche%'";*/

		$sql= "SELECT commentaire, id_saison FROM
				commentaire INNER JOIN  jsp ON commentaire.id_jsp= jsp.id_jsp
				inner join saison on  jsp.id_saison = saison.id
				WHERE commentaire like '%".$motcle."%'";

		if ($saison != null){				

				$sql = $sql . " AND saison.nom = '".$saison."'";
				//$sql = $sql . " AND saison.nom = ':SaisonA'";

		}

		
		$stmnt =$pdo->prepare($sql);

		/*$sql = $stmnt->bindValue(':motrecherche', $motcle, PDO::PARAM_STR);
		if ($saison !=null){$sql = $stmnt->bindValue(':SaisonA', $saison, PDO::PARAM_STR);
		}*/

		$stmnt->execute();

		$results = $stmnt->fetchall();

		$stmnt->closeCursor();
		return $results;
	}

	function find_joueur($categorie,$joueur,$entraineur,$saison){
		
		$pdo = connectDB();

		$sql = "SELECT joueur.nom, joueur.prenom,saison.nom,categorie.nom,entraineur.nom,entraineur.prenom from joueur
		INNER JOIN jsc ON jsc.id_joueur = joueur.id
			 INNER JOIN  categorie ON jsc.id_categorie = categorie.id
			 INNER JOIN  saison ON jsc.id_saison = saison.id
			 INNER JOIN  esc ON jsc.id_saison = esc.id_saison
			 INNER JOIN  entraineur ON entraineur.id = esc.id_entraineur";

	$faut_i_il_ajouter_un_where=true;

     if($categorie!=null){

     	$sql .= " where categorie.nom = toto";

        $faut_i_il_ajouter_un_where=false;
     }


	if($joueur!=null){		
		
		if($faut_i_il_ajouter_un_where=true)
		{
			$sql .=  " where joueur.nom = toto";
			$faut_i_il_ajouter_un_where = false;
		}
		else 
			$sql .=  " and joueur.nom = toto";


     }

      if($entraineur!=null){


			if($faut_i_il_ajouter_un_where=true)
			{
				$sql .=  " where entraineur.nom = toto";
				$faut_i_il_ajouter_un_where = false;
			}
			else
				$sql .=  " and entraineur.nom = toto";


     }

      if($saison!=null){

			if($faut_i_il_ajouter_un_where=true)
			{
				$sql .=  " where saison.nom = toto";
				$faut_i_il_ajouter_un_where = false;
			}
			else
				$sql .=  " and saison.nom = toto";


     }




	}