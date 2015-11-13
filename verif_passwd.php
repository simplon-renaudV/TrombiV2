<!DOCTYPE html>
  <html lang="fr">

    <head>
      <meta charset="utf-8">
      <title>Trombinoscope</title>
      <link rel="stylesheet" href="style.css"/>
      <link href='https://fonts.googleapis.com/css?family=Cabin:600italic' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Mr+Dafoe' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Amaranth:700' rel='stylesheet' type='text/css'>
    </head>

    <body><!-- Formulaire de demande du mot de passe -->

		<?php  
	
		include("Jquery/html.html"); // Bandeau de navigation 

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

		
        include ("Jquery/foot.html"); //Footer

		?>
	</body>
</html>