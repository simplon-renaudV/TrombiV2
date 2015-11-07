<!DOCTYPE html>
	<html lang="fr">

		<head>
			<meta charset="utf-8">
			<title>Formulaire</title>
		</head>

		<body>

			<?php
				
        include("../../configPDO.php"); //recupère les infos de connexions a la bdd

				$nom = strtoupper($_POST['nom']);	//mets le nom en majuscule
				
				$prenom = strtolower($_POST['prenom']);	//mets le prénom en minuscule
				$prenom = ucfirst($prenom);	//mets la première lettre du prénom en majuscule
				
				$lienphoto = "images/".$prenom."_".$nom.".JPG"; //crée le lien pour la photo avec une concaténation
  			
				$req = $bdd->prepare('INSERT INTO simploniens(nom, prenom, photo, cv, mail, telephone, naissance) VALUES (:nom, :prenom, :photo, :cv, :mail, :telephone, :naissance)');
				$req->execute(array(
						'nom' => $nom,
						'prenom' => $prenom,
						'photo' => $lienphoto,
						'cv' => $_POST['cv'],
						'mail' => $_POST['mail'],
						'telephone' => $_POST['telephone'],
						'naissance' => $_POST['naissance']));
			?>
		</body>
	</html>
