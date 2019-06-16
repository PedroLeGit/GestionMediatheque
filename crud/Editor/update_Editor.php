<?php
// BLOC D'INSTRUCTION POUR MODIFIER UN EDITEUR

  // echo 'idweb='; var_dump($_GET['idweb']); echo "\n";
  // echo 'idC='; var_dump($_GET['idC'])

  require ('../../inc/dbGM.php');
  require ('../../inc/dbC#.php');


  $idediteur = $_GET['idediteur'];
  $editeurnom = $_GET['editeurnom'];
  $editeurcreation = $_GET['editeurcreation'];

$sql = "UPDATE editeur
        SET EditeurNom = ?,
            EditeurCreation = ?
            WHERE EditeurNum = ?";
$prep = $pdoGM->prepare($sql);
$prep->execute([$editeurnom, $editeurcreation, $idediteur]);



$sql = "UPDATE editeur
        SET EditeurNom = ?,
            EditeurCreation = ?
            WHERE EditeurNum = ?";
$prep = $pdoC->prepare($sql);
$prep->execute([$editeurnom, $editeurcreation, $idediteur]);

  if($prep->execute() == true){
    echo 'true';
  }else {
    echo 'false';
  }
// FIN BLOC D'INSTRUCTION POUR MODIFIER UN EDITEUR
?>
