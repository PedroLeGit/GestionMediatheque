
<?php
// BLOC D'INSTRUCTION POUR SUPPRIMER UN LIVRE
  //SUPPRIME LE LIVRE DANS LES DEUX TABLES
  //
  // echo 'idweb='; var_dump($_GET['idweb']); echo "\n";
  // echo 'idC='; var_dump($_GET['idC'])

  $idlivre = $_GET['idlivre'];


require ('../inc/dbGM.php');
  $prep = $pdoGM->prepare("DELETE FROM livres WHERE BdId = ?");
  $prep->execute([(int)$idlivre]);

require ('../inc/dbC#.php');
  $prep = $pdoC->prepare("DELETE FROM bd WHERE BdId = ?");
  $prep->execute([(int)$idlivre]);

  if($prep->execute() == true){
    echo 'true';
  }else {
    echo 'false';
  }
// FIN BLOC D'INSTRUCTION POUR SUPPRIMER UN LIVRE
?>
