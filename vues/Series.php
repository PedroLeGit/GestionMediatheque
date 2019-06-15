<?php
// FONCTION D'AJOUT SERIE
//AJOUTE UNIQUEMENT DANS LA BDD C# PUISQU'IL SUFFIRA DE FAIRE L'IMPORTATION POUR CLONE SUR LA BDD WEB
require ('inc/dbC#.php');

if (isset($_SESSION["formulaire_envoye"])) {
	$_POST = $_SESSION["formulaire_envoye"];
	unset($_SESSION["formulaire_envoye"]);
}

if (!empty($_POST)){
  if (!empty($_POST['serienom']) && !empty($_POST['serienbtomes']))){

    $sql2 = $pdoC->prepare('INSERT INTO serie (SerieNom, SerieNbTomes)
    VALUES (?,?)');
    $exec = $sql2->execute([$_POST['serienom'], $_POST['serienbtomes']]);
  }
  ?>
<script>
 if($exec == true){
  alert("Nouvelle serie ajoutee");
}else {
  alert("Erreur d'enregistrement");
}
location.reload();
</script><?php

}

?>

<script>
//CONTROLE LES DONNEES DU FORMULAIRE AJOUT SERIE
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

//COLLAPSE LA LISTE SERIES
  function collapseSeries(){
    $("#listingSeries").slideToggle("slow");
  }

//MET A JOUR LES DONNEES LISTE SERIES
	function majSeries(){
	    $.ajax({url: "../crud/importBDD_Series.php", success : function(result){
	      if (result == "true"){
	        window.alert("Pas de nouvelle donnee a importer");
	      } else {
	        window.alert("Les dernieres donnees ont ete mis a jour avec succes");
	      }
	    }});
	  }

//SUPPRIME UNE SERIE
	function supprSeries(idweb, idC){
		// window.alert(idweb, idC);
		$.get("../crud/delete_Serie.php?idserie="+idserie, function(valueSeries, status){
			if(status == "success"){
				window.alert('Serie supprimee');
				location.reload();
			}else {
				window.alert('Cette serie ne peut etre supprimee ou a deja ete supprime');
				location.reload();
			}
		});
	}

//MODIFIE UNE SERIE
	function modifFormulaireSerie(idserie, serienom, serienbtomes){
		// window.alert("#tdNom"+idweb+idC);
		$("#tdSerienom"+idserie).wrap("<td><input type=\"text\" id=\"tdSerienom\" value="+serienom+" style=\"text-align: center; padding_left: 50px;\"></td>");
		$("#tdSerienbtomes"+idserie).wrap("<td><input type=\"text\" id=\"tdSerienbtomes\" value="+serienbtomes+" style=\"text-align: center; padding_left: 50%;\"></td>");
		$("input").change(function(){
			var serienom1 = document.getElementById("tdSerienom").value;
			var serienbtomes1 = document.getElementById("tdSerienbtomes").value;
	  	$.get("../crud/update_Serie.php?idserie="+idserie+"&serienom="+serienom1+"&serienbtomes="+serienbtomes1, function(valueSeries, status){

				alert("Data:"+valueSeries+"\nStatus :"+status);
				location.reload();
			});
		});
		// $("#tdNomUtilisateur+idweb+idC").wrapAll("<input type=\"text\", value=\".nom.\"></input>");
		// $("#tdPrenomUtilisateur+idweb+idC").wrapAll("<input type=\"text\", value=\".prenom.\"></input>");
		// $("#tdMailUtilisateur+idweb+idC").wrapAll("<input type=\"text\", value=\".mail.\"></input>");
	}


</script>

<div class="container">
  <h2>Liste des Series</h2>

  <input type="button" class="btn btn-info" value="Mettre a jour la base" onclick="majSeries()">

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo">Ajouter une serie</button>
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter une serie</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div><!-- .modal-header -->
        <div class="modal-body">
          <form name="FormulaireSeries" action="/" onsubmit="return ajoutSerie()" method="post" >
            <div class="form-group">
              Nom de la serie : <input type="text" name="serienom"><br/>
              Nombre de tomes de la serie: <input type="text" name="serienbtomes"><br/>
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
<input type="button" value="Montrer/Cacher Liste" class="btn btn-info" onclick="collapseSeries()">

<div id="listingSeries" class="listingSeries" style="display: none;">
  <?php
  require ('inc/dbGM.php');
  try{
    $sql = 'SELECT SerieNum, SerieNom, SerieNbTomes FROM serie ORDER BY SerieNom';
    $res2 = $pdoGM->query($sql);
    $res = $res2->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <br />
    <table style="width:100%">
      <tr>
        <th style="text-align: center;" style="display: hide;">IDSERIE</th><!--PENSER A MASQUER-->
        <th style="text-align: center;">Serie</th>
        <th style="text-align: center;">Nombre de tommes</th>
        <th style="text-align: center;"></th>
        <th style="text-align: center;"></th>
        <th></th>
      </tr>

      <?php

    foreach ($res as $key => $value) {
        $idserie = $value['SerieNum'];
        $serienom = $value['SerieNom'];
        $serienbtomes = $value['SerieNbTomes'];
      ?>
      <tr>
        <!-- 	<td id="tdMailUtilisateur<?php echo $idweb.$idC; ?>" style="text-align: center;"> <?php echo $value['mail_utilisateur'] ?> </td> -->
        <td style="text-align: center;"> <?php echo $value['SerieNum'] ?> </td>
        <td id="tdSerienom<?php echo $idserie; ?>" style="text-align: center;"> <?php echo $value['SerieNom'] ?> </td>
        <td id="tdSerienbtomes<?php echo $idserieC; ?>" style="text-align: center;"> <?php echo $value['SerieNbTomes'] ?> </td>
        <td style="text-align: center;"><button type="button" class="btn btn-info" onclick="modifFormulaireSerie(<?php echo $idserie.",".$serienom.",".$serienbtomes; ?>)">Modifier</button></td>
        <td style="text-align: center;"><button type="button" class="btn btn-info" onclick="supprSeries(<?php echo $idserie; ?>)">Supprimer</button></td>
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
