<?php
// BLOC D'INSTRUCTION POUR MODIFIER UN Livre

  // echo 'idweb='; var_dump($_GET['idweb']); echo "\n";
  // echo 'idC='; var_dump($_GET['idC'])

  require ('../../inc/dbGM.php');
  require ('../../inc/dbC#.php');


  $idlivre = $_GET['idlivre'];
  $titre = $_GET['titre'];
  $tome = $_GET['tome'];
  $parution = $_GET['parution'];
  $serie = $_GET['serie'];
  $editeur = $_GET['editeur'];

  $res = $pdoGM->prepare('SELECT SerieNum FROM serie WHERE SerieNom = ?');
  $res->execute([$serie]);
//Fetch ne prend aucaun parametre
  $serie2 = $res->fetchAll(PDO::FETCH_ASSOC);
  // var_dump((int)$serie2[0]['SerieNum']);



  $res = $pdoGM->prepare('SELECT EditeurNum FROM editeur WHERE EditeurNom = ?');
  $res->execute([$editeur]);
  //Fetch ne prend aucaun parametre
  $editeur2 = $res->fetchAll(PDO::FETCH_ASSOC);
  // var_dump((int)$editeur2[0]['EditeurNum']);
  //   exit();


//   var_dump($idlivre." ".$titre." ".$tome." ".$parution." ".(int)$serie2." ".(int)$editeur2);
// exit();
$serie3 = (int)$serie2[0]['SerieNum'];
$editeur3 = (int)$editeur2[0]['EditeurNum'];
$sql = "UPDATE livres
        SET BdTitre = ?,
            BdTome = ?,
            BdParution = ?,
            NumSerie = ?,
            NumEditeur = ?
            WHERE BdId = ?";
$prep = $pdoGM->prepare($sql);
$prep->execute([$titre, $tome, $parution, $serie3,$editeur3 , $idlivre]);



$sql = "UPDATE bd
        SET BdTitre = ?,
            BdTome = ?,
            BdParution = ?,
            NumSerie = ?,
            NumEditeur = ?
            WHERE BdId = ?";
$prep = $pdoC->prepare($sql);
$prep->execute([$titre, $tome, $parution, $serie3, $editeur3, $idlivre]);

  if($prep->execute() == true){
    echo 'true';
  }else {
    echo 'false';
  }
// FIN BLOC D'INSTRUCTION POUR MODIFIER UN UTILISATEUR
?>
