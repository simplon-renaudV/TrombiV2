<!-- Formulaire pour l'upload des photos -->

<!DOCTYPE html>
<html lang="fr">

    <head>
      <meta charset="utf-8">
      <title>Upload photo</title>
      <link rel="stylesheet" href="style.css"/>
      <link href='https://fonts.googleapis.com/css?family=Cabin:600italic' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Mr+Dafoe' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Amaranth:700' rel='stylesheet' type='text/css'>
    </head>
    
    <body>
    	<?php

		include("Jquery/html.html"); // Bandeau de navigation 


		$id=$_GET['id'];
		echo "<form name\"upload\" method=\"post\" action=\"upload.php?id=$id\" enctype=\"multipart/form-data\">
				<input type=\"file\" name=\"photo\" />
				<input type=\"submit\" value=\"Envoyer\"/>
			</form>";
		
    include ("Jquery/foot.html"); //Footer
    
    ?>
	

  </body>
</html>