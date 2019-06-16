<?php
// BLOC D'INSTRUCTION POUR SUPPRIMER UNE SERIE
  //SUPPRIME LA SERIE DANS LES DEUX TABLES
  //
  // echo 'idweb='; var_dump($_GET['idweb']); echo "\n";
  // echo 'idC='; var_dump($_GET['idC'])

  $idserie = $_GET['idserie'];

require ('../../inc/dbGM.php');
  $sql = "DELETE FROM serie WHERE SerieNum = :id";
  $prep = $pdoGM->prepare($sql);
  $prep->bindParam(':id', $idserie, PDO::PARAM_INT);
  $prep->execute();

require ('../../inc/dbC#.php');
  $sql = "DELETE FROM bd WHERE SerieNum = :id";
  $prep = $pdoC->prepare($sql);
  $prep->bindParam(':id', $idserie, PDO::PARAM_INT);
  $prep->execute();

  if($prep->execute() == true){
    echo 'true';
  }else {
    echo 'false';
  }
// FIN BLOC D'INSTRUCTION POUR SUPPRIMER UNE SERIE
?>
