<!DOCTYPE html>
  <html lang="fr">

    <head>
      <meta charset="utf-8">
      <title>Trombinoscope</title>
      <link rel="stylesheet" href="style.css"/>
      <link href='https://fonts.googleapis.com/css?family=Cabin:600italic' rel='stylesheet' type='text/css'>
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
          

          // passage des variables $id, $tel et $date en paramètre via l'url
          echo "<div class=\"row\">
                  <div class=\"w-6\">
                    <div><a href=\"simplonien.php?id=$id&tel=$tel&date=$date\"><img class=\"img_simploniens \"src=\"".$donnees['photo']."\" alt=\"".$donnees['prenom']." ".$donnees['nom']."\" title=\"".$donnees['prenom']." ".$donnees['nom']."\"/></a></div>
                    <div><br /><p class=\"p_trombi\">".$donnees['prenom']."</p></div>
                    <div><p class=\"p_trombi\">".$donnees['nom']."</p></div>
                    <div><p class=\"p_trombi\"><a href=\"".$donnees['cv']."\">CV</a></p></div>
                    <div><p class=\"p_trombi\">".$donnees['mail']."</p></div>
                    <div><p class=\"p_trombi\">".$tel."</p></div>
                    <div><p class=\"p_trombi\">".$date."</p></div>
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