<?php  

	$id=$_GET['id'];
	$mode=$_GET['mode'];

	if ($mode=='sup')
	{
		echo 	"<form method=\"post\" action=\"supprimer.php?id=$id\">
					<label for=\"password\">Mot de passe : </label><input type=\"password\" name=\"password\"/>
				</form>";	
	}

	if ($mode=='mod')
	{
		echo 	"<form method=\"post\" action=\"f_modifier.php?id=$id\">
					<label for=\"password\">Mot de passe : </label><input type=\"password\" name=\"password\"/>
				</form>";
	}
?>
