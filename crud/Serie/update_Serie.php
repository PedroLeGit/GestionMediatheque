<?php
// BLOC D'INSTRUCTION POUR MODIFIER UN serie

  // echo 'idweb='; var_dump($_GET['idweb']); echo "\n";
  // echo 'idC='; var_dump($_GET['idC'])

  require ('../../inc/dbGM.php');
  require ('../../inc/dbC#.php');


  $idserie = $_GET['idserie'];
  $serienom = $_GET['serienom'];
  $serienbtomes = $_GET['serienbtomes'];

$sql = "UPDATE serie
        SET SerieNom = ?,
            SerieNbTomes = ?
            WHERE SerieNum = ?";
$prep = $pdoGM->prepare($sql);
$prep->execute([$serienom, $serienbtomes, $idserie]);



$sql = "UPDATE serie
        SET SerieNom = ?,
            SerieNbTomes = ?
            WHERE SerieNum = ?";
$prep = $pdoC->prepare($sql);
$prep->execute([$serienom, $serienbtomes, $idserie]);

  if($prep->execute() == true){
    echo 'true';
  }else {
    echo 'false';
  }
// FIN BLOC D'INSTRUCTION POUR MODIFIER UN UTILISATEUR
?>
