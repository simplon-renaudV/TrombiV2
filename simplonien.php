<!--Page affichant en grand la photo et les informations d'un simplonien en particulier -->

<!DOCTYPE html>
  <html lang="fr">

    <head>
      <meta charset="utf-8">
      <title>Simplonien</title>
      <link rel="stylesheet" href="style.css"/>
      <link href='https://fonts.googleapis.com/css?family=Cabin:600italic' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Mr+Dafoe' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Amaranth:700' rel='stylesheet' type='text/css'>
    </head>

    <body>
      <?php
        
        include("../../configPDO.php"); //recupère les infos de connexions a la bdd

        /* Les variables $_GET['id'], $_GET['tel'] et $_GET['date'] ont été récupérés depuis
        la page Trombinoscope.php via l'url*/

        include("Jquery/html.html"); // Bandeau de navigation 

        $t_simploniens = $bdd->prepare('SELECT * FROM simploniens WHERE id=:id');
        $t_simploniens->execute(array('id' => $_GET['id']));
        
        while ($donnees = $t_simploniens->fetch())
        {

          echo "<div class=\"row\">
                  <div class=\"w-6\">
                    <div><img class=\"img_grande \"src=\"".$donnees['photo']."\" alt=\"".$donnees['prenom']." ".$donnees['nom']."\" title=\"".$donnees['prenom']." ".$donnees['nom']."\"/></div>                 
                  </div>
                </div>";

          echo "<div class=\"row\">
                  <div class=\"w-6\" id=\"t_simplonien\">
                    <div><p class=\"p_simplonien\">".$donnees['prenom']."</p></div>
                    <div><p class=\"p_simplonien\">".$donnees['nom']."</p></div>
                    <div><p class=\"p_simplonien\"><a href=\"".$donnees['cv']."\">CV</a></p></div>
                    <div><p class=\"p_simplonien\">".$donnees['mail']."</p></div>
                    <div><p class=\"p_simplonien\">".$_GET['tel']."</p></div>
                    <div><p class=\"p_simplonien\">".$_GET['date']."</p></div>
                  </div>
                </div>";
          echo "<p class=\"clear\"></p>";
        }

        include ("Jquery/foot.html"); //Footer
      ?>
    </body>
  </html>