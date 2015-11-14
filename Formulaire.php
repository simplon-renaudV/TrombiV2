
<head>
			 <meta charset="utf-8" />
			 <link rel="stylesheet" href="style.css" />
</head>
<body id="formulaire">

<form method="post" action="trombi.php">

<fieldset>
	<p><label for="Nom">Entrez votre Nom :</label><input type="text" size=30 name="nom" /></p>
	<p><label for="Prenom">Entrez votre Prenom :</label><input type="text" size=30 name="prenom" /></p>
</fieldset>

	<fieldest>
			<p><label for="CV">Lien du CV :</label>
			<input type="text" class="format" name="cv"/></p>

			<p><label for="Adresse_Mail">Entrez votre adresse Mail :</label>
			<input type="text" class="format"  name="mail" /></p>

			<p><label for="Numero_Tel">Entrez votre numero de Tel :</label>
			<input type="text" class="format"  name="telephone"/></p>

			<p><label for="Date_Naissance">Entrez votre date de Naissance :</label>
			<input type="text" class="format" name="naissance"/></p>
		</p> </fieldest>


		<p>
		<input type="submit" name="valider" value="Envoyer"/>
		<input type="reset" value="Rétablir" />
	</p>





</form>
</body>
