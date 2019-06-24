<!-- BLOC D'INSTRUCTION POUR AJOUTER UN EDITEUR -->
<?php
// FONCTION D'AJOUT EDITEUR
//AJOUTE UNIQUEMENT DANS LA BDD C# PUISQU'IL SUFFIRA DE FAIRE L'IMPORTATION POUR CLONE SUR LA BDD WEB
require ('inc/dbC#.php');

if (isset($_SESSION["formulaire_envoye"])) {
	$_POST = $_SESSION["formulaire_envoye"];
	unset($_SESSION["formulaire_envoye"]);
}

	if (!empty($_POST)){
	  if (!empty($_POST['editeurnom']) && !empty($_POST['editeurcreation'])
     && !empty($_POST['editeuradresse']) && !empty($_POST['editeurcp'])
     && !empty($_POST['editeurville']) && !empty($_POST['editeurtel'])
     && !empty($_POST['editeurfax'])  && !empty($_POST['editeurmail'])
     && !empty($_POST['editeurnomcontact']) && !empty($_POST['editeurprenomcontact'])){
// var_dump($_POST);
	    $sql2 = $pdoC->prepare('INSERT INTO editeur (EditeurNom, EditeurCreation, EditeurAdresse, EditeurCP, EditeurVille, EditeurTel, EditeurFax, EditeurMail, EditeurNomContact, EditeurPrenomContact)
	    VALUES (?,?,?,?,?,?,?,?,?,?)');
	    $exec = $sql2->execute([$_POST['editeurnom'],$_POST['editeurcreation'],
        $_POST['editeuradresse'],$_POST['editeurcp'],
        $_POST['editeurville'],$_POST['editeurtel'],
        $_POST['editeurfax'],$_POST['editeurmail'],
        $_POST['editeurnomcontact'],$_POST['editeurprenomcontact']]);
		if($sql2->execute() == true){
			echo 'true';
		}else {
			echo 'false';
		}
	  }



	}


?>
<!-- FIN BLOC D'INSTRUCTION POUR AJOUTER UN EDITEUR -->
