<meta http-equiv="refresh" content="2;Trombinoscope.php" />


<?php
   include("../../configPDO.php"); //recupère les infos de connexions a la bdd

   $req = $bdd->prepare('DELETE FROM simploniens WHERE id = :suppr');
   $req->execute(array('suppr' => $_GET['id']));
?>