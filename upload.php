<!-- Page pour uploader une photo -->

<?php
    include("../../configPDO.php"); //recupère les infos de connexions a la bdd

	
	$id = $_GET['id'];
    
    $t_simploniens = $bdd->prepare('SELECT * FROM simploniens WHERE id=:id');
    $t_simploniens->execute(array('id' => $id));

    while ($donnees = $t_simploniens->fetch())
    {
    	$taille_maxi = 5000000; // taille maximum acceptée pour la photo en octets (5mo)
		$taille = filesize($_FILES['photo']['tmp_name']); // taille de la photo
		$extensions = array('.png', '.gif', '.jpg', '.jpeg', '.JPG'); //tableau contenant les extensions acceptées
		$extension = strrchr($_FILES['photo']['name'], '.'); //récupération de l'extension du fichier
		
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
    		$tmp_name = $_FILES['photo']['tmp_name']; // récupère le chemin temporaire du fichier uploadé
			$destination = 'images/'; // répertoire de destination
			$fichier = $donnees['prenom']."_".$donnees['nom'].".JPG"; // renommage du fichier 			
			
			//crée une photo à partir de l'image temporaire uploadée
			$photoOrigine = imagecreatefromjpeg($tmp_name);
	
			//si le rapport est superieur à 1 la largeur est plus grande que la hauteur
			$rapport = imagesx($photoOrigine) / imagesy($photoOrigine);

			if ($rapport > 0.75) // 0.75 correspond au rapport d'une photo en 640 x 480
			{
				//crée une image vide avec la bonne hauteur (640) et une largeur en proportion
				$hauteur = 640;	
				$largeur = $hauteur*$rapport;
				$photoRedim= imagecreatetruecolor($largeur, $hauteur);
			}	
			else
			{
				//crée une image vide avec la bonne largeur (480) et une largeur en proportion
				$largeur = 480;	
				$hauteur = $largeur/$rapport;
				$photoRedim= imagecreatetruecolor($largeur, $hauteur);
			}

			//redimensionne l'image et l'enregistre
			imagecopyresampled($photoRedim, $photoOrigine, 0, 0, 0, 0, $largeur, $hauteur, imagesx($photoOrigine), imagesy($photoOrigine));
	
			$coordRecadrage = array('x'=>0, 'y'=>0, 'width'=>480, 'height'=>640); 
			$photoRedim = imagecrop($photoRedim, $coordRecadrage); //recadre l'image grace aux coordonnees du tableau

			imagejpeg($photoRedim, $destination.$fichier);

			//move_uploaded_file($tmp_name, $destination.$fichier); // déplacement du fichier

			// Modification de la bdd avec l'ajout du nouveau lien pour la photo
			$req = $bdd->prepare('UPDATE simploniens SET photo=:photo WHERE id = :id');
			$req->execute(array(
        			'photo' => $destination.$fichier,
        			'id' => $_GET['id']));
		}
	}
?>