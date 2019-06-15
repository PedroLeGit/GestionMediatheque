<!-- BLOC D'INSTRUCTION POUR AJOUTER UN LIVRE -->
<?php
//AJOUTE UNIQUEMENT DANS LA BDD C# PUISQU'IL SUFFIRA DE FAIRE L'IMPORTATION POUR CLONE SUR LA BDD WEB
require ('inc/dbC#.php');

if (isset($_SESSION["formulaire_envoye"])) {
	$_POST = $_SESSION["formulaire_envoye"];
	unset($_SESSION["formulaire_envoye"]);
}

if (!empty($_POST)){
  if (!empty($_POST['titre']) && !empty($_POST['isbn']) && !empty($_POST['tome'])
  && !empty($_POST['parution']) && !empty($_POST['nbpages'])
  && !empty($_POST['image']) && !empty($_POST['couleur'])
  && !empty($_POST['commentaire']) && !empty($_POST['format'])
	 && !empty($_POST['series']) && !empty($_POST['editeur'])){

    $sql2 = $pdoC->prepare('INSERT INTO bd (BdTitre, BdIsbn, BdTome, BdParution, bdNbPages, BdImage, BdCouleur, BdCommentaires, BdFormat, NumSerie, NumEditeur)
    VALUES (?,?,?,?,?,?,?,?,?,?,?)');
    $exec = $sql2->execute([$_POST['titre'], $_POST['isbn'], $_POST['tome'], $_POST['parution'], $_POST['nbpages'], $_POST['image'], $_POST['couleur'],
		 $_POST['commentaire'], $_POST['format'], $_POST['series'], $_POST['editeur']]);
  }

  ?>
  <script>
	location.reload();
	</script><?php

}
?>

<!-- FIN BLOC D'INSTRUCTION POUR AJOUTER UN LIVRE -->
