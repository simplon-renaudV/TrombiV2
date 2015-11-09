<?php  

	$id=$_GET['id'];
	$mode=$_GET['mode'];

	if ($mode=='sup') // si le mode est sup alors on ouvre la page supprimer avec l'id en paramètre
	{
		echo 	"<form method=\"post\" action=\"supprimer.php?id=$id\">
					<label for=\"password\">Mot de passe : </label><input type=\"password\" name=\"password\"/>
				</form>";	
	}

	if ($mode=='mod') // si le mode est mod alors on ouvre la page supprimer avec l'id en paramètre
	{
		echo 	"<form method=\"post\" action=\"f_modifier.php?id=$id\">
					<label for=\"password\">Mot de passe : </label><input type=\"password\" name=\"password\"/>
				</form>";
	}
?>
