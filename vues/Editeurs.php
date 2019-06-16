<script>
//CONTROLE LES DONNEES DU FORMULAIRE AJOUT EDITEUR

//https://www.w3schools.com/js/js_validation.asp
// function ajoutSerie() {
//   var serienom1 = document.forms["FormulaireSeries"]["serienom"].value;
//   var serienbtomes1 = document.forms["FormulaireSeries"]["serienbtomes"].value;
//
//   if (serienom1 == "" || serienbtomes1 == "") {
//     alert("L'un des champs est vide");
//     return false;
//   }
//
//   $.post("../crud/add_Serie.php",{nom: serienom1, nbtomes: serienbtomes},
//     function(data, status){
//       alert("Les donnees du POST:"+data+"\n Le status de la requete:"+status);
//     });
// }

//COLLAPSE LA LISTE EDITEUR
  function collapseEditeurs(){
    $("#listingEditeurs").slideToggle("slow");
  }

//MET A JOUR LES DONNEES LISTE EDITEUR
	function majEditeurs(){
	    $.ajax({url: "../crud/Editor/importBDD_Editors.php", success : function(result){
	      if (result == "true"){
	        window.alert("Pas de nouvelle donnee a importer");
					location.reload();
	      } else {
	        window.alert("Les dernieres donnees ont ete mis a jour avec succes");
					location.reload();
	      }
	    }});
	  }

//SUPPRIME UN EDITEUR
	function supprEditeurs(idediteur){
		// window.alert(idweb, idC);
		$.get("../crud/Editor/delete_Editor.php?idediteur="+idediteur, function(valueEditeurs, status){
			if(status == "success"){
				window.alert('editeur supprime');
				location.reload();
			}else {
				window.alert('Cette editeur ne peut etre supprime ou a deja ete supprime');
				location.reload();
			}
		});
	}

//MODIFIE UN EDITEUR
	function modifFormulaireEditeurs(idediteur, editeur, editeurcreation){
		// window.alert("#tdNom"+idweb+idC);
		$("#tdEditeurs"+idediteur).wrap("<td><input type=\"text\" id=\"tdEditeursNom\" value="+editeur+" style=\"text-align: center; padding_left: 50px;\"></td>");
		$("#tdEditeurs"+idediteur).wrap("<td><input type=\"text\" id=\"tdEditeursCreation\" value="+editeurcreation+" style=\"text-align: center; padding_left: 50%;\"></td>");
		$("input").change(function(){
			var editeur1 = document.getElementById("tdEditeursNom").value;
			var editeurcreation1 = document.getElementById("tdEditeursCreation").value;
	  	$.get("../crud/Editor/update_Editor.php?idediteur="+idediteur+"&editeur="+editeur+"&editeurcreation="+editeurcreation, function(valueEditeurs, status){

				alert("Data:"+valueEditeurs+"\nStatus :"+status);
				location.reload();
			});
		});
		// $("#tdNomUtilisateur+idweb+idC").wrapAll("<input type=\"text\", value=\".nom.\"></input>");
		// $("#tdPrenomUtilisateur+idweb+idC").wrapAll("<input type=\"text\", value=\".prenom.\"></input>");
		// $("#tdMailUtilisateur+idweb+idC").wrapAll("<input type=\"text\", value=\".mail.\"></input>");
	}


</script>

<div class="container">
  <h2>Liste des Editeurs</h2>

  <input type="button" class="btn btn-info" value="Mettre a jour la base" onclick="majEditeurs()">

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3" data-whatever="@mdo">Ajouter un editeur</button>
  <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter un editeur</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div><!-- .modal-header -->
        <div class="modal-body">
          <form name="FormulaireEditeurs" action="/" onsubmit="return ajoutEditeurs()" method="post" >
            <div class="form-group">
              Nom de l'editeur : <input type="text" name="editeur"><br/>
              Date de creation: <input type="number" name="editeurcreation"><br/>
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
<?php include ('crud/Editor/add_Editor.php')?>

  <br/>
  <br/>

<!-- BLOC D'INSTRUCTION LISTING -->
<input type="button" value="Montrer/Cacher Liste" class="btn btn-info" onclick="collapseEditeurs()">

<div id="listingEditeurs" class="listingEditeurs" style="display: none;">
  <?php
  require ('inc/dbGM.php');
  try{
    $sql = 'SELECT EditeurNum, EditeurNom, EditeurCreation FROM editeur ORDER BY EditeurNom';
    $res2 = $pdoGM->query($sql);
    $res = $res2->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <br />
    <table style="width:100%">
      <tr>
        <th style="text-align: center;" style="display: hide;">IDEDITEUR</th><!--PENSER A MASQUER-->
        <th style="text-align: center;">Editeurs</th>
        <th style="text-align: center;">Annee de creation</th>
        <th style="text-align: center;"></th>
        <th style="text-align: center;"></th>
        <th></th>
      </tr>

      <?php

    foreach ($res as $key => $value) {
        $idediteur = $value['EditeurNum'];
        $editeur = $value['EditeurNom'];
        $editeurcreation = $value['EditeurCreation'];
      ?>
      <tr>
        <td style="text-align: center;"> <?php echo $value['EditeurNum'] ?> </td>
        <td id="tdEditeurs<?php echo $idediteur; ?>" style="text-align: center;"> <?php echo $value['Editeurs'] ?> </td>
        <td id="tdEditeurs<?php echo $idediteur; ?>" style="text-align: center;"> <?php echo $value['EditeursCreation'] ?> </td>
        <td style="text-align: center;"><button type="button" class="btn btn-info" onclick="modifFormulaireEditeurs(<?php echo $idediteur.",'".$editeur."',".$editeurcreation; ?>)">Modifier</button></td>
        <td style="text-align: center;"><button type="button" class="btn btn-info" onclick="supprEditeurs(<?php echo $idediteur; ?>)">Supprimer</button></td>
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
</div> <!-- listingSeries -->

<!-- FIN BLOC D'INSTRUCTION LISTING -->

</div> <!-- .container pour les series -->
