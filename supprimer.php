<!-- Page servant à supprimer une personne de la bdd -->

<!DOCTYPE html>
<html lang="fr">

   <head>
      <meta charset="utf-8">
      <title>Supprimer</title>
      <link rel="stylesheet" href="style.css"/>
      <link href='https://fonts.googleapis.com/css?family=Cabin:600italic' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Mr+Dafoe' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Amaranth:700' rel='stylesheet' type='text/css'>
   </head>

   <body>
      
      
      <?php     

         $id=$_GET['id'];

         $f_passwd = fopen('../../mdpTrombi', 'r');   //ouvre le fichier contenant le mot de passe
         $passwd=fgets($f_passwd);
         
         $passwd=substr($passwd,0,-1); //enlève le dernier caractère du mot de passe (il est invisible)

         
        //si l'utilisateur est local (ip 127.0.0.1) ou si les mots de passe correspondent on lance la requête

         if (($_POST['password'] == $passwd) || ($_SERVER["REMOTE_ADDR"]='127.0.0.1')) 
         {
            include("../../configPDO.php"); //recupère les infos de connexions a la bdd

            $req = $bdd->prepare('DELETE FROM simploniens WHERE id = :suppr'); //supprime l'enregistrement
            $req->execute(array('suppr' => $_GET['id']));
         
            echo header('Location: Trombinoscope.php'); // redirection vers la page Trombinoscope.php   
         }
         
         else
         {
            echo header('Location: verif_passwd.php?id='.$id.'&mode=sup');
         }
      ?>
   
   </body>

</html>