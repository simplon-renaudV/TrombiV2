<!DOCTYPE html>
<html lang="fr">

   <head>
      <meta charset="utf-8">
      <meta http-equiv="refresh" content="2;Trombinoscope.php" />
      <title>Trombinoscope</title>
      <link rel="stylesheet" href="style.css"/>
      <link href='https://fonts.googleapis.com/css?family=Cabin:600italic' rel='stylesheet' type='text/css'>
   </head>

   <body>

      <?php
   
         include("../../configPDO.php"); //recupère les infos de connexions a la bdd

         $req = $bdd->prepare('DELETE FROM simploniens WHERE id = :suppr');
         $req->execute(array('suppr' => $_GET['id']));
      
      ?>
   
   </body>

</html>