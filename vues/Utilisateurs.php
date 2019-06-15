<?php
// FONCTION D'AJOUT UTILISATEUR
//AJOUTE UNIQUEMENT DANS LA BDD C# PUISQU'IL SUFFIRA DE FAIRE L'IMPORTATION POUR CLONE SUR LA BDD WEB
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

<script>
//CONTROLE LES DONNEES DU FORMULAIRE AJOUT UTILISATEURS
//https://www.w3schools.com/js/js_validation.asp
// function ajoutUtilisateurs() {
//   var nom1 = document.forms["FormulaireUtilisateurs"]["nom"].value;
//   var prenom1 = document.forms["FormulaireUtilisateurs"]["prenom"].value;
//   var rue1 = document.forms["FormulaireUtilisateurs"]["rue"].value;
//   var codepostal1 = document.forms["FormulaireUtilisateurs"]["codepostal"].value;
//   var ville1 = document.forms["FormulaireUtilisateurs"]["ville"].value;
//   var datenaissance1 = document.forms["FormulaireUtilisateurs"]["datenaissance"].value;
//   var mail1 = document.forms["FormulaireUtilisateurs"]["mail"].value;
//   var dateinscription1 = document.forms["FormulaireUtilisateurs"]["dateinscription"].value;
//
//   if (nom1 == "" || prenom1 == "" || rue1 == "" || codepostal1 == "" ||
//   ville1 == "" || datenaissance1 == "" || mail1 == "" || dateinscription1 == "" ) {
//     alert("L'un des champs est vide");
//     return false;
//   }
//
//   $.post("../crud/add_User.php",{nom: nom1, prenom: prenom1, rue: rue1, codepostal:codepostal1,
// ville: ville1, datenaissance: datenaissance1, mail: mail1, dateinscription: dateinscription1},
//     function(data, status){
//       alert("Les donnees du POST:"+data+"\n Le status de la requete:"+status);
//     });
// }

//COLLAPSE LA LISTE UTILISATEURS
  function collapseUtilisateurs(){
    $("#listingUsers").slideToggle("slow");
  }

//MET A JOUR LES DONNEES LISTE UTILISATEURS
	function majUtilisateurs(){
	    $.ajax({url: "../crud/importBDD_Users.php", success : function(result){
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
		$.get("../crud/delete_User.php?idweb="+idweb+"&idC="+idC, function(valueUtilisateurs, status){
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
	  	$.get("../crud/update_User.php?idweb="+idweb+"&idC="+idC+"&nom="+nom1+"&prenom="+prenom1+"&mail="+mail1, function(valueUtilisateurs, status){

				alert("Data:"+valueUtilisateurs+"\nStatus :"+status);
				location.reload();
			});
		});
		// $("#tdNomUtilisateur+idweb+idC").wrapAll("<input type=\"text\", value=\".nom.\"></input>");
		// $("#tdPrenomUtilisateur+idweb+idC").wrapAll("<input type=\"text\", value=\".prenom.\"></input>");
		// $("#tdMailUtilisateur+idweb+idC").wrapAll("<input type=\"text\", value=\".mail.\"></input>");
	}


</script>

<div class="container">
  <h2>Liste des Utilisateurs</h2>

  <input type="button" class="btn btn-info" value="Mettre a jour la base" onclick="majUtilisateurs()">

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Ajouter un utilisateur</button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter un utilisateur</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div><!-- .modal-header -->
        <div class="modal-body">
          <form name="FormulaireUtilisateurs" action="/" onsubmit="return ajoutUtilisateurs()" method="post" >
            <div class="form-group">
              Nom: <input type="text" name="nom"><br/>
              Prenom: <input type="text" name="prenom"><br/>
              Rue: <input type="text" name="rue"><br/>
              Code postal: <input type="text" name="cp"><br/>
              Ville:  <input type="text" name="ville"><br/>
              Date naissance:   <input type="date" name="datenaissance"><br/>
              Adresse mail:     <input type="email" name="mail"><br/>
              Date inscription:   <input type="date" name="dateinscription"><br/><br/>
              <input type="submit"class="btn btn-primary" value="Ajouter">
            </div> <!-- form-group -->
          </form> <!-- .myForm -->
        </div><!-- .modal-body -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div><!-- .modal-footer -->
      </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
  </div><!-- .modal fade  -->


  <br/>
  <br/>

<!-- BLOC D'INSTRUCTION LISTING -->
<input type="button" value="Montrer/Cacher Liste" class="btn btn-info" onclick="collapseUtilisateurs()">

<div id="listingUsers" class="listingUsers" style="display: none;">
  <?php
  require ('inc/dbGM.php');
  try{
    $sql = 'SELECT id_utilisateur, old_emp_num, nom_utilisateur, prenom_utilisateur, mail_utilisateur FROM utilisateurs ORDER BY nom_utilisateur';
    $res2 = $pdoGM->query($sql);
    $res = $res2->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <br />
    <table style="width:100%">
      <tr>
        <th style="text-align: center;" style="display: hide;">IDWEB</th><!--PENSER A MASQUER-->
        <th style="text-align: center;"style="display: hide;">IDC#</th><!--PENSER A MASQUER-->
        <th style="text-align: center;">Nom</th>
        <th style="text-align: center;">Prenom</th>
        <th style="text-align: center;">Mail</th>
        <th style="text-align: center;"></th>
        <th style="text-align: center;"></th>
        <th></th>
      </tr>

      <?php

    foreach ($res as $key => $value) {
        $idweb = $value['id_utilisateur'];
        $idC = $value['old_emp_num'];
        $nom = $value['nom_utilisateur'];
        $prenom = $value['prenom_utilisateur'];
        $mail = $value['mail_utilisateur'];
      ?>
      <tr>
        <!-- 	<td id="tdMailUtilisateur<?php echo $idweb.$idC; ?>" style="text-align: center;"> <?php echo $value['mail_utilisateur'] ?> </td> -->
        <td style="text-align: center;"> <?php echo $value['id_utilisateur'] ?> </td>
        <td style="text-align: center;"> <?php echo $value['old_emp_num'] ?> </td>
        <td id="tdNom<?php echo $idweb.$idC; ?>" style="text-align: center;"> <?php echo $value['nom_utilisateur'] ?> </td>
        <td id="tdPrenom<?php echo $idweb.$idC; ?>" style="text-align: center;"> <?php echo $value['prenom_utilisateur'] ?> </td>
        <td id="tdMail<?php echo $idweb.$idC; ?>" style="text-align: center;"> <?php echo $value['mail_utilisateur'] ?> </td>
        <td style="text-align: center;"><button type="button" class="btn btn-info" onclick="modifFormulaireUtilisateurs(<?php echo $idweb.",".$idC.",'".$nom."','".$prenom."','".$mail."'"; ?>)">Modifier</button></td>
        <td style="text-align: center;"><button type="button" class="btn btn-info" onclick="supprUtilisateurs(<?php echo $idweb.",".$idC; ?>)">Supprimer</button></td>
        <td><br/><br/></td>
      </tr>
      <?php
    }
  } catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
  }
  ?>

  </table>
</div> <!-- listingUsers -->

<!-- FIN BLOC D'INSTRUCTION LISTING -->

</div> <!-- .container pour les utilisateurs -->
