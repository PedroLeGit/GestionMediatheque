<!-- BLOC D'INSTRUCTION POUR AJOUTER UN LIVRE -->
<?php
//AJOUTE UNIQUEMENT DANS LA BDD C# PUISQU'IL SUFFIRA DE FAIRE L'IMPORTATION POUR CLONE SUR LA BDD WEB
require ('inc/dbC#.php');

if (isset($_SESSION["formulaire_envoye"])) {
	$_POST = $_SESSION["formulaire_envoye"];
	unset($_SESSION["formulaire_envoye"]);
}


if (!empty($_POST)){
	if(!empty($_POST['titre']) && !empty($_POST['isbn'])&& !empty($_POST['tome']) && !empty($_POST['parution']) &&
	!empty($_POST['nbpages']) && !empty($_POST['image']) && !empty($_POST['couleur']) &&
	 !empty($_POST['commentaire']) && !empty($_POST['format'])){

		$serie = $_POST['series'];
		$editeur = $_POST['editeurs'];
		var_dump($_POST);

		 // $res = $pdoC->prepare('SELECT SerieNum FROM serie WHERE SerieNom = ?');
		 // $res->execute([$serie]);
		 // $resC1 = $res->fetchAll(PDO::FETCH_ASSOC);
		 //
		 //
		 // $res = $pdoGM->prepare('SELECT EditeurNum FROM editeur WHERE EditeurNom = ?');
		 // $res->execute([$editeur]);
		 // $resC2 = $res->fetchAll(PDO::FETCH_ASSOC);
		 // var_dump($resC1);
		 // var_dump($resC2);
		 // // var_dump((int)$resC1[0]['SerieNum']);
		 // // var_dump((int)$resC2[0]['EditeurNum']);

    $sql2 = $pdoC->prepare('INSERT INTO bd (BdTitre, BdIsbn, BdTome, BdParution, bdNbPages, BdImage, BdCouleur, BdCommentaires, BdFormat, NumSerie, NumEditeur)
    VALUES (?,?,?,?,?,?,?,?,?,?,?)');
    $exec = $sql2->execute([$_POST['titre'], $_POST['isbn'], $_POST['tome'], $_POST['parution'], $_POST['nbpages'], $_POST['image'], $_POST['couleur'],
		 $_POST['commentaire'], $_POST['format'], (int)$serie, (int)$editeur]);


	if($sql2->execute() == true){
		echo 'true';
	}else {
		echo 'false';
	}
}
}
?>

<!-- FIN BLOC D'INSTRUCTION POUR AJOUTER UN LIVRE -->
