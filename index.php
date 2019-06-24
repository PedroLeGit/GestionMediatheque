<?php
require ('inc/header.php');

if(isset($_GET['result'])){
$successAjoutQuestion =  $_GET['result'];
}

if(!empty($successAjoutQuestion) && $successAjoutQuestion == "success"){
	alertAjout();
}
?>
<script>
function alertAjout(){
	alert('Utilisateur bien ajoute');
}
</script>



<!-- APPEL VUE UTILISATEUR -->
	<?php include "vues/Utilisateurs.php"; ?>
<!-- FIN APPEL VUE UTILISATEUR -->

<!-- APPEL VUE LIVRES -->
	<?php include "vues/Livres.php"; ?>
<!-- FIN APPEL VUE LIVRES -->

<!-- APPEL VUE SERIES -->
	<?php include "vues/Series.php"; ?>
<!-- FIN APPEL VUE SERIES -->

<!-- APPEL VUE EDITEURS -->
	<?php include "vues/Editeurs.php"; ?>
<!-- FIN APPEL VUE EDITEURS -->

<!-- APPEL VUE QUESTION -->
	<?php include "vues/Questions.php"; ?>
<!-- FIN APPEL VUE QUESTION -->

<?php require ('inc/footer.php') ?>
