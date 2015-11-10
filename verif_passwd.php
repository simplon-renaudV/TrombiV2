<!-- Formulaire de demande du mot de passe -->

<?php  
	$id=$_GET['id'];
	$mode=$_GET['mode'];
	
	//si l'ip est celle de l'utilisateur local (127.0.0.1) et qu'on est en mode suppresion
	//on charge la page de suppresion sans demander le mdp
	if (($_SERVER["REMOTE_ADDR"]=='127.0.0.1')&&($mode=='sup'))
	{
		echo header('Location: supprimer.php?id='.$id);
	}

	//si l'ip est celle de l'utilisateur local (127.0.0.1) et qu'on est en mode modification
	//on charge la page de modification sans demander le mdp
	if (($_SERVER["REMOTE_ADDR"]=='127.0.0.1')&&($mode=='mod'))
	{
		echo header('Location: f_modifier.php?id='.$id);
	}

	if ($mode=='sup') //affichage de la demande de mot de passe pour la page supprimer 
	{
		echo 	"<form method=\"post\" action=\"supprimer.php?id=$id\">
					<label for=\"password\">Mot de passe : </label><input type=\"password\" name=\"password\"/>
				</form>";	
	}

	if ($mode=='mod') //affichage de la demande de mot de passe pour la page modification
	{
		echo 	"<form method=\"post\" action=\"f_modifier.php?id=$id\">
					<label for=\"password\">Mot de passe : </label><input type=\"password\" name=\"password\"/>
				</form>";
	}


?>
