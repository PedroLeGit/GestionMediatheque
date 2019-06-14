<?php

session_start();
if (!empty($_POST)) {
	$_SESSION["formulaire_envoye"] = $_POST;
	header("Location: ".$_SERVER["PHP_SELF"]);
	exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="css/app.css" rel="stylesheet">
    <link href="css/overrideBootstrap.css" rel="stylesheet">

    <title>Mediatheque</title>

<!-- <script src="jquery-3.4.1.min.js"></script> -->

</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Mediatheque LesMotsTordus</a>

    <!-- <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <?php if (isset($_SESSION['auth'])): ?>
                <li class="nav-item active"><a href="logout.php">Deconnexion</a></li>
            <?php else: ?>

                <li class="nav-item active">
                <a href="login.php">Deconnexion</a>
            </li>
                 <span class="sr-only">(current)</span>
        <?php endif; ?>
        </ul>
    </div> -->
</nav>


<script>
//COLLAPSE LA LISTE UTILISATEURS
  function collapseUtilisateurs(){
    $("#listingUsers").slideToggle("slow");
  }

//MET A JOUR LES DONNEES LISTE UTILISATEURS
function majUtilisateurs(){
    $.ajax({url: "AjaxmajUtilisateurs.php", success : function(result){
      if (result == "true"){
        window.alert("Pas de nouvelle donnee a importer");
      } else {
        window.alert("Les dernieres donnees ont ete mis a jour avec succes");
      }
    }});
  }


//SUPPRIME UN UTILISATEUR
function supprUtilisateurs(idweb, idC){
	// window.alert(idweb, idC);
	$.get("DeleteUser.php?idweb="+idweb+"&idC="+idC, function(valueUtilisateurs, status){
		if(status == "success"){
			window.alert('Utilisateur supprime');
			location.reload();
		}else {
			window.alert('Cet utilisateur ne peut etre supprime ou a deja ete supprime');
			location.reload();
		}
	});
}

//MODIFIE UN UTILISATEUR
function modifFormulaireUtilisateurs(idweb, idC, nom, prenom, mail){
	// window.alert("#tdNom"+idweb+idC);
	$("#tdNom"+idweb+idC).wrap("<td><input type=\"text\" id=\"tdNom\" value="+nom+" style=\"text-align: center; padding_left: 50px;\"></td>");
	$("#tdPrenom"+idweb+idC).wrap("<td><input type=\"text\" id=\"tdPrenom\" value="+prenom+" style=\"text-align: center; padding_left: 50%;\"></td>");
	$("#tdMail"+idweb+idC).wrap("<td><input type=\"text\" id=\"tdMail\" value="+mail+" style=\"text-align: center; padding_left: 50%;\"></td>");
	$("input").change(function(){
		var nom1 = document.getElementById("tdNom").value;
		var prenom1 = document.getElementById("tdPrenom").value;
		var mail1 = document.getElementById("tdMail").value;
  	$.get("modifUtilisateurs.php?idweb="+idweb+"&idC="+idC+"&nom="+nom1+"&prenom="+prenom1+"&mail="+mail1, function(valueUtilisateurs, status){

			alert("Data:"+valueUtilisateurs+"\nStatus :"+status);
			location.reload();
		});
	});
	// $("#tdNomUtilisateur+idweb+idC").wrapAll("<input type=\"text\", value=\".nom.\"></input>");
	// $("#tdPrenomUtilisateur+idweb+idC").wrapAll("<input type=\"text\", value=\".prenom.\"></input>");
	// $("#tdMailUtilisateur+idweb+idC").wrapAll("<input type=\"text\", value=\".mail.\"></input>");
}
</script>

<!-- APPEL VUE UTILISATEUR -->
	<?php include "vues/Utilisateurs.php"; ?>
<!-- FIN APPEL VUE UTILISATEUR -->
