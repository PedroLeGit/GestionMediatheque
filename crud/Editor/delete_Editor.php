<?php
// BLOC D'INSTRUCTION POUR SUPPRIMER UN EDITEUR
  //SUPPRIME L'EDITEUR' DANS LES DEUX TABLES
  //
  // echo 'idweb='; var_dump($_GET['idweb']); echo "\n";
  // echo 'idC='; var_dump($_GET['idC'])

  $idediteur = $_GET['idediteur'];

require ('../../inc/dbGM.php');
  $sql = "DELETE FROM editeur WHERE EditeurNum = :id";
  $prep = $pdoGM->prepare($sql);
  $prep->bindParam(':id', $idediteur, PDO::PARAM_INT);
  $prep->execute();

require ('../../inc/dbC#.php');
  $sql = "DELETE FROM editeur WHERE EditeurNum = :id";
  $prep = $pdoC->prepare($sql);
  $prep->bindParam(':id', $idediteur, PDO::PARAM_INT);
  $prep->execute();

  if($prep->execute() == true){
    echo 'true';
  }else {
    echo 'false';
  }
// FIN BLOC D'INSTRUCTION POUR SUPPRIMER UN EDITEUR
?>
