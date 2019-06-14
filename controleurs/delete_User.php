
<?php
// BLOC D'INSTRUCTION POUR SUPPRIMER UN UTILISATEUR
  //SUPPRIME l'UTILISATEUR DANS LES DEUX TABLES
  //
  // echo 'idweb='; var_dump($_GET['idweb']); echo "\n";
  // echo 'idC='; var_dump($_GET['idC'])
  $idweb = $_GET['idweb'];
  $idC = $_GET['idC'];

require ('inc/dbGM.php');
  $sql = "DELETE FROM utilisateurs WHERE id_utilisateur = :id";
  $prep = $pdoGM->prepare($sql);
  $prep->bindParam(':id', $idweb, PDO::PARAM_INT);
  $prep->execute();

require ('inc/dbC#.php');
  $sql = "DELETE FROM emprunteur WHERE emp_num = :id";
  $prep = $pdoC->prepare($sql);
  $prep->bindParam(':id', $idC, PDO::PARAM_INT);
  $prep->execute();

  if($prep->execute() == true){
    echo 'true';
  }else {
    echo 'false';
  }
// FIN BLOC D'INSTRUCTION POUR SUPPRIMER UN UTILISATEUR
?>
