<?php
// BLOC D'INSTRUCTION POUR MODIFIER UN UTILISATEUR

  // echo 'idweb='; var_dump($_GET['idweb']); echo "\n";
  // echo 'idC='; var_dump($_GET['idC'])
  $idweb = $_GET['idweb'];
  $idC = $_GET['idC'];
  $nom = $_GET['nom'];
  $prenom = $_GET['prenom'];
  $mail = $_GET['mail'];
  var_dump($idweb." ".$idC." ".$nom." ".$prenom." ".$mail);

require ('inc/dbGM.php');
$sql = "UPDATE utilisateurs
        SET nom_utilisateur = ?,
            prenom_utilisateur = ?,
            mail_utilisateur = ?
           WHERE id_utilisateur = ?";
$prep = $pdoGM->prepare($sql);
$prep->execute([$nom, $prenom, $mail, $idweb]);


require ('inc/dbC#.php');
$sql = "UPDATE emprunteur
        SET emp_nom = :emp_nom,
            emp_prenom = :emp_prenom,
            emp_mail = :emp_mail
            WHERE emp_num = :id";
$prep = $pdoC->prepare($sql);
$prep->bindParam(':emp_nom', $nom, PDO::PARAM_STR);
$prep->bindParam(':emp_prenom', $prenom, PDO::PARAM_STR);
$prep->bindParam(':emp_mail', $mail, PDO::PARAM_STR);
$prep->bindParam(':id', $idC, PDO::PARAM_INT);
$prep->execute();

  if($prep->execute() == true){
    echo 'true';
  }else {
    echo 'false';
  }
// FIN BLOC D'INSTRUCTION POUR MODIFIER UN UTILISATEUR
?>
