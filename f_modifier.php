<!-- Formulaire de modification dans la bdd -->

<!DOCTYPE html>
  <html lang="fr">

    <head>
      <meta charset="utf-8">
      <title>Modifier</title>
      <link rel="stylesheet" href="style.css"/>
      <link href='https://fonts.googleapis.com/css?family=Cabin:600italic' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Mr+Dafoe' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Amaranth:700' rel='stylesheet' type='text/css'>
    </head>

    <body>
      
      <?php

        include("Jquery/html.html"); // Bandeau de navigation

        $f_passwd = fopen('../../mdpTrombi', 'r'); //ouvre le fichier mdp en lecture
        $passwd=fgets($f_passwd); //récupère le mot de passe dans le fichier
        $passwd=substr($passwd,0,-1); // enlève le dernier caractère qui est caché
        
        //si l'utilisateur est local (ip 127.0.0.1) ou si les mots de passe correspondent on lance la requête
        if (($_SERVER["REMOTE_ADDR"]='127.0.0.1') || ($_POST['password'] == $passwd))
        {
          include("../../configPDO.php"); //recupère les infos de connexions a la bdd

          $id = $_GET['id'];
          $t_simploniens = $bdd->prepare('SELECT * FROM simploniens WHERE id=:id');
          $t_simploniens->execute(array('id' => $id));

          while ($donnees = $t_simploniens->fetch())
          {

            echo "<form name=\"form\" method=\"post\" action=\"modifier.php?id=$id\">
                    <p><label for=\"nom\">Nom :</label> <input type=\"text\" placeholder=\"Nom\" name=\"nom\" id=\"nom\" value=\"".$donnees['nom']."\"/></p>
                    <p><label for=\"prenom\">Prénom :</label> <input type=\"text\" placeholder=\"prenom\" name=\"prenom\" value=\"".$donnees['prenom']."\" id=\"Prenom\"/></p>
                    <p><label for=\"cv\">CV :</label> <input type=\"text\" placeholder=\"Addresse du CV\" name=\"cv\" id=\"cv\" value=\"".$donnees['cv']."\"/></p>
                    <p><label for=\"mail\">Mail :</label> <input type=\"text\" placeholder=\"Email\" name=\"mail\" id=\"mail\" value=\"".$donnees['mail']."\"/></p>
                    <p><label for=\"telephone\">Téléphone :</label> <input type=\"text\" placeholder=\"Telephone\" name=\"telephone\" id=\"telephone\" value=\"".$donnees['telephone']."\"/></p>
                    <p><label for=\"naissance\">Date de naissance :</label> <input type=\"text\" placeholder=\"Date de naissance\" name=\"naissance\" id=\"naissance\" value=\"".$donnees['naissance']."\"/></p>
                    <p><input type=\"submit\" value=\"Envoyer\"/></p>
                  </form>";

          }

        }     
        else
        {
          echo header('Location: verif_passwd.php?id='.$id.'&mode=sup');
        }
      
        include ("Jquery/foot.html"); //Footer
      
      ?>
    </body>
  </html>