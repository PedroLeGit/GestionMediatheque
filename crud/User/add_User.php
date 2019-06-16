<!-- BLOC D'INSTRUCTION POUR AJOUTER UN UTILISATEUR -->


<?php
//AJOUTE UNIQUEMENT DANS LA BDD C# PUISQU'IL SUFFIRA DE FAIRE L'IMPORTATION POUR CLONE SUR LA BDD WEB
// FONCTION D'AJOUT UTILISATEUR
require ('inc/dbC#.php');

if (isset($_SESSION["formulaire_envoye"])) {
	$_POST = $_SESSION["formulaire_envoye"];
	unset($_SESSION["formulaire_envoye"]);
}

if (!empty($_POST)){
  if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['rue'])
  && !empty($_POST['cp']) && !empty($_POST['ville'])
  && !empty($_POST['datenaissance']) && !empty($_POST['mail'])
  && !empty($_POST['dateinscription'])){

    $sql2 = $pdoC->prepare('INSERT INTO emprunteur (emp_nom, emp_prenom, emp_rue, emp_code_postal, emp_ville, emp_date_naiss, emp_mail, emp_prem_adh)
    VALUES (?,?,?,?,?,?,?,?)');
    $exec = $sql2->execute([$_POST['nom'], $_POST['prenom'], $_POST['rue'], $_POST['cp'], $_POST['ville'], $_POST['datenaissance'], $_POST['mail'], $_POST['dateinscription']]);
  }
  ?>
<script>
 if($exec == true){
  alert("Utilisateur enregistre");
}else {
  alert("Erreur d'enregistrement");
}
location.reload();
</script><?php

}

?>

<!-- FIN BLOC D'INSTRUCTION POUR AJOUTER UN UTILISATEUR -->
