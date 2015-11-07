<!DOCTYPE html>
  <html lang="fr">

    <head>
      <meta charset="utf-8">
      <title>Trombinoscope</title>
      <link rel="stylesheet" href="style.css"/>
    </head>

    <body>
      <?php
        
        include("../../configPDO.php"); //recupère les infos de connexions a la bdd

        $t_simploniens = $bdd->query('SELECT * FROM simploniens ORDER BY nom');
        
        $colonne = 'gauche';

        while ($donnees = $t_simploniens->fetch())
        {
          
          // Vérifie si la date de naissance est valide dans la bdd et si oui, l'affiche au format d/m/Y
          // ne l'affiche pas si elle n'est pas valide
          if ($donnees['naissance'] != '0000-00-00')
          {
            $date = date_create($donnees['naissance']);
            $date = date_format($date, 'd/m/Y');
          }
          else
          {
            $date = '';
          }
          
          // Rajoute des espaces entre les chiffres du numero de telephone
          $tel = chunk_split($donnees['telephone'], 2)." ";
          
          $id=$donnees['id'];
          
          echo "<div class=\"row\">
                  <div class=\"w-6\">
                    <div><a href=\"simplonien.php?id=$id\"><img class=\"img_simploniens \"src=\"".$donnees['photo']."\"/></a></div>
                    <div><p>".$donnees['prenom']."</p></div>
                    <div><p>".$donnees['nom']."</p></div>
                    <div><p><a href=\"".$donnees['cv']."\">CV</a></p></div>
                    <div><p>".$donnees['mail']."</p></div>
                    <div><p>".$tel."</p></div>
                    <div><p>".$date."</p></div>
                  </div>
                </div>";
                
          if ($colonne == 'droite')
          {
            echo "<p class=\"clear\"></p>";
            $colonne='gauche';
          }
          elseif ($colonne == 'gauche')
          {
            $colonne='droite';
          }         
        }

        $t_simploniens->closeCursor(); 

      ?>
    </body>
  </html