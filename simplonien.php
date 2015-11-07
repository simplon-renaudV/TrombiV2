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

        
        $t_simploniens = $bdd->prepare('SELECT * FROM simploniens WHERE id=:id');
        $t_simploniens->execute(array('id' => $_GET['id']));
        
        while ($donnees = $t_simploniens->fetch())
        {
          echo "<img src=\"".$donnees['photo']."\"/>";
        }

      ?>
    </body>
  </html>