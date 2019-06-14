
<?php
// BLOC D'INSTRUCTION POUR SUPPRIMER UN LIVRE
  //SUPPRIME LE LIVRE DANS LES DEUX TABLES
  //
  // echo 'idweb='; var_dump($_GET['idweb']); echo "\n";
  // echo 'idC='; var_dump($_GET['idC'])

  $idlivre = $_GET['idlivre'];

require ('inc/dbGM.php');
  $sql = "DELETE FROM livres WHERE BdId = :id";
  $prep = $pdoGM->prepare($sql);
  $prep->bindParam(':id', $idlivre, PDO::PARAM_INT);
  $prep->execute();

require ('inc/dbC#.php');
  $sql = "DELETE FROM bd WHERE BdId = :id";
  $prep = $pdoC->prepare($sql);
  $prep->bindParam(':id', $idlivre, PDO::PARAM_INT);
  $prep->execute();

  if($prep->execute() == true){
    echo 'true';
  }else {
    echo 'false';
  }
// FIN BLOC D'INSTRUCTION POUR SUPPRIMER UN UTILISATEUR
?>
