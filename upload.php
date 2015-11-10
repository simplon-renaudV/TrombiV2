<?php
    include("../../configPDO.php"); //recupère les infos de connexions a la bdd

	
	$id = $_GET['id'];
    
    $t_simploniens = $bdd->prepare('SELECT * FROM simploniens WHERE id=:id');
    $t_simploniens->execute(array('id' => $id));

    while ($donnees = $t_simploniens->fetch())
    {
    	$taille_maxi = 5000000;
		$taille = filesize($_FILES['photo']['tmp_name']);
		$extensions = array('.png', '.gif', '.jpg', '.jpeg', '.JPG');
		$extension = strrchr($_FILES['photo']['name'], '.'); 
		
		//Début des vérifications de sécurité...
		if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
		{
     		$erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, JPG';
			echo $erreur;
		}

		if($taille>$taille_maxi)
		{
     		$erreur = 'Le fichier est trop gros...';
			echo $erreur;
		}

		if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
		{		
    		$tmp_name = $_FILES['photo']['tmp_name'];
			$destination = 'images/';
			$fichier = $donnees['prenom']."_".$donnees['nom'].".JPG";
			move_uploaded_file($tmp_name, $destination.$fichier);

			$req = $bdd->prepare('UPDATE simploniens SET photo=:photo WHERE id = :id');
			$req->execute(array(
        			'photo' => $destination.$fichier,
        			'id' => $_GET['id']));
		}
	}
?>