<meta http-equiv="refresh" content="2;Trombinoscope.php" />

<?php
    
    include("../../configPDO.php"); //recupère les infos de connexions a la bdd

    $nom = strtoupper($_POST['nom']);	//mets le nom en majuscule
	
	$nom_photo = str_replace(" ", "_", $nom); //remplace les espaces par des _ dans l'addresse de la photo

	$prenom = strtolower($_POST['prenom']);	//mets le prénom en minuscule
	$prenom = ucfirst($prenom);	//mets la première lettre du prénom en majuscule
				
	$lienphoto = "images/".$prenom."_".$nom_photo.".JPG"; //crée le lien pour la photo avec une concaténation
  			
	//Teste la présence de la photo et si elle n'existe pas met comme lien dans la bdd PasDePhoto.JPG
	if (!file_exists($lienphoto))		
		{
    		$lienphoto = "images/PasDePhoto.JPG";	
    	}

    $req = $bdd->prepare('UPDATE simploniens SET nom=:nom, prenom=:prenom, photo=:photo, cv=:cv, mail=:mail, telephone=:telephone, naissance=:naissance WHERE id = :id');
	$req->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'photo' => $lienphoto,
        'cv' => $_POST['cv'],
        'mail' => $_POST['mail'],
        'telephone' => $_POST['telephone'],
        'naissance' => $_POST['naissance'],
		'id' => $_GET['id']));
?>