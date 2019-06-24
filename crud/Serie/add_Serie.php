<!-- BLOC D'INSTRUCTION POUR AJOUTER UNE SERIE -->
<?php
// FONCTION D'AJOUT SERIE
//AJOUTE UNIQUEMENT DANS LA BDD C# PUISQU'IL SUFFIRA DE FAIRE L'IMPORTATION POUR CLONE SUR LA BDD WEB
require ('inc/dbC#.php');

if (isset($_SESSION["formulaire_envoye"])) {
	$_POST = $_SESSION["formulaire_envoye"];
	unset($_SESSION["formulaire_envoye"]);
}

	if (!empty($_POST)){
	  if (!empty($_POST['serienom']) && !empty($_POST['serienbtomes'])){

	    $sql2 = $pdoC->prepare('INSERT INTO serie (SerieNom, SerieNbTomes)
	    VALUES (?,?)');
	    $exec = $sql2->execute([$_POST['serienom'], $_POST['serienbtomes']]);
			if($sql2->execute() == true){
				echo 'true';
			}else {
				echo 'false';
			}
	  }


	}



?>
<!-- FIN BLOC D'INSTRUCTION POUR AJOUTER UNE SERIE -->
