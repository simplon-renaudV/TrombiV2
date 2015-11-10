<?php

	$id=$_GET['id'];
	echo "<form name\"upload\" method=\"post\" action=\"upload.php?id=$id\" enctype=\"multipart/form-data\">
			<input type=\"file\" name=\"photo\" />
			<input type=\"submit\" value=\"Envoyer\"/>
		</form>";
?>