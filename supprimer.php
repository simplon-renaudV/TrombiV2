<!DOCTYPE html>
<html lang="fr">

   <head>
      <meta charset="utf-8">
      <!--
      <meta http-equiv="refresh" content="2;Trombinoscope.php" />
      -->
      <title>Trombinoscope</title>
      <link rel="stylesheet" href="style.css"/>
      <link href='https://fonts.googleapis.com/css?family=Cabin:600italic' rel='stylesheet' type='text/css'>
   </head>

   <body>
      
      
      <?php     

         $id=$_GET['id'];

         $f_passwd = fopen('../../mdpTrombi', 'r');
         $passwd=fgets($f_passwd);
         
         $passwd=substr($passwd,0,-1);
         if ($_POST['password'] == $passwd)
         {
            include("../../configPDO.php"); //recupère les infos de connexions a la bdd

            $req = $bdd->prepare('DELETE FROM simploniens WHERE id = :suppr');
            $req->execute(array('suppr' => $_GET['id']));
         
            echo header('Location: Trombinoscope.php');   
         }
         
         else
         {
            echo header('Location: Trombinoscope.php');
         }
      ?>
   
   </body>

</html>