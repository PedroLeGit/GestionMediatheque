<script>
//CONTROLE LES DONNEES DU FORMULAIRE AJOUT LIVRES
//https://www.w3schools.com/js/js_validation.asp
function ajoutLivre() {
  var titre1 = document.getElementById("titre").value;
  var isbn1 = document.getElementById("isbn").value;
  var tome1 = document.getElementById("tome").value;
  var parution1 = document.getElementById("parution").value;
  var nbpage1 = document.getElementById("nbpage").value;
  var image1 = document.getElementById("image").value;
  var couleur1 = document.getElementById("commentaire").value;
  var format1 = document.getElementById("format").value;
  var serie1 = document.getElementById("series").value;
  var editeur1 = document.getElementById("editeur").value;


  if (nom == "" || prenom == "" || rue == "" || codepostal == "" ||
  ville == "" || datenaissance == "" || mail == "" || dateinscription == "" ) {
    alert("L'un des champs est vide");
    return false;
  }
}

//COLLAPSE LA LISTE LIVRES
  function collapseLivres(){
    $("#listingBooks").slideToggle("slow");
  }

//MET A JOUR LES DONNEES LISTE LIVRES
	function majLivres(){
	    $.ajax({url: "../crud/importBDD_Books.php", success : function(result){
	      if (result == "true"){
	        window.alert("Pas de nouvelle donnee a importer");
	      } else {
	        window.alert("Les dernieres donnees ont ete mis a jour avec succes");
	      }
	    }});
	  }

//SUPPRIME UN LIVRE
	function supprLivres(idlivre){
		// window.alert(idweb, idC);
		$.get("../crud/delete_Book.php?idlivre="+idlivre, function(valueLivres, status){
			if(status == "success"){
				window.alert('Livre supprime');
				location.reload();
			}else {
				window.alert('Ce livre ne peut etre supprime ou a deja ete supprime');
				location.reload();
			}
		});
	}

//MODIFIE UN LIVRE
	function modifFormulaireLivres(idlivre, titre, tome, parution, serie, editeur){
		// window.alert("<td><input type=\"text\" id=\"tdTitre\" value='"+titre+"' style=\"text-align: center; padding_left: 50px;\"></td>");
		$("#tdTitre"+idlivre).wrap("<td><input type=\"text\" id=\"tdTitre\" value='"+titre+"' style=\"text-align: center; padding_left: 50px;\"></td>");
		$("#tdTome"+idlivre).wrap("<td><input type=\"text\" id=\"tdTome\" value='"+tome+"' style=\"text-align: center; padding_left: 50%;\"></td>");
		$("#tdParution"+idlivre).wrap("<td><input type=\"text\" id=\"tdParution\" value="+parution+" style=\"text-align: center; padding_left: 50%;\"></td>");
    $("#tdSerie"+idlivre).wrap("<td><input type=\"text\" id=\"tdSerie\" value='"+serie+"' style=\"text-align: center; padding_left: 50%;\"></td>");
    $("#tdEditeur"+idlivre).wrap("<td><input type=\"text\" id=\"tdEditeur\" value='"+editeur+"' style=\"text-align: center; padding_left: 50%;\"></td>");
		$("input").change(function(){
			var titre1 = document.getElementById("tdTitre").value;
			var tome1 = document.getElementById("tdTome").value;
			var parution1 = document.getElementById("tdParution").value;
      var serie1 = document.getElementById("tdSerie").value;
      var editeur1 = document.getElementById("tdEditeur").value;
	  	$.get("../crud/update_Book.php?idlivre="+idlivre+"&titre="+titre1+"&tome="+tome1+"&parution="+parution1+"&serie="+serie1+"&editeur="+editeur1, function(valueLivres, status){

				alert("Data:"+valueLivres+"\nStatus :"+status);
				location.reload();
			});
		});
		// $("#tdNomUtilisateur+idweb+idC").wrapAll("<input type=\"text\", value=\".nom.\"></input>");
		// $("#tdPrenomUtilisateur+idweb+idC").wrapAll("<input type=\"text\", value=\".prenom.\"></input>");
		// $("#tdMailUtilisateur+idweb+idC").wrapAll("<input type=\"text\", value=\".mail.\"></input>");
	}


</script>

<div class="container">
  <h2>Liste des Livres</h2>

  <input type="button" class="btn btn-info" value="Mettre a jour la base" onclick="majLivres()">

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo">Ajouter un livre</button>
  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter un livre</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div><!-- .modal-header -->
        <div class="modal-body">
          <form name="FormulaireLivres" action="/" onsubmit="return ajoutLivre()" method="post" >
            <div class="form-group">
              Titre: <input type="text" name="titre"><br/>
              ISBN: <input type="text" name="isbn"><br/>
              Tome: <input type="text" name="tome"><br/>
              Date parution: <input type="date" name="parution"><br/>
              Nombre de Pages:  <input type="number" min="1" name="nbpages"><br/>
              Image:  <input type="text" name="image"><br/>
              Couleur:     <input type="text" name="couleur"><br/>
              Commentaire:   <input type="text" name="commentaire"><br/>
              Format:   <input type="text" name="format"><br/>

              Serie:   <input list="series" name="series">
                <datalist id="series">
                  <?php
                  $sql = 'SELECT SerieNom FROM serie';
                  $res = $pdoGM->query($sql);
                  $resGM = $res->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($resGM as $key => $value) {
                    echo '<option value='.$value.'>';
                  }
                ?>
                </datalist>  <br/>

              Editeur:   <input type="text" name="editeur">
                <datalist id="editeurs">
                  <?php
                  $sql = 'SELECT EditeurNom FROM editeur';
                  $res = $pdoGM->query($sql);
                  $resGM = $res->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($resGM as $key => $value) {
                    echo '<option value='.$value.'>';
                  }
                ?>
                </datalist>  <br/>

              <br/><br/>
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
<input type="button" value="Montrer/Cacher Liste" class="btn btn-info" onclick="collapseLivres()">

<div id="listingBooks" class="listingBooks" style="display: none;">
  <?php
  require ('inc/dbGM.php');
  try{
    $sql = 'SELECT BdId, BdTitre, BdTome, BdParution, SerieNom, EditeurNom
    FROM livres
    INNER JOIN serie ON livres.NumSerie = serie.SerieNum
    INNER JOIN editeur ON livres.NumEditeur = editeur.EditeurNum
    ORDER BY BdTitre';
    $res2 = $pdoGM->query($sql);
    $res = $res2->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <br />
    <table style="width:100%">
      <tr>
        <th style="text-align: center;">ID BD</th>
        <th style="text-align: center;">Titre</th>
        <th style="text-align: center;">Tome</th>
        <th style="text-align: center;">Date Parution</th>
        <th style="text-align: center;">Serie</th>
        <th style="text-align: center;">Editeur</th>
        <th style="text-align: center;"></th>
        <th style="text-align: center;"></th>
        <th></th>
      </tr>

      <?php

    foreach ($res as $key => $value) {
        $idlivre = $value['BdId'];
        $titre = $value['BdTitre'];
        $tome = $value['BdTome'];
        $parution = $value['BdParution'];
        $serie = $value['SerieNom'];
        $editeur = $value['EditeurNom'];

      ?>
      <tr>
        <!-- 	<td id="tdMailUtilisateur<?php echo $idweb.$idC; ?>" style="text-align: center;"> <?php echo $value['mail_utilisateur'] ?> </td> -->
        <td style="text-align: center;"> <?php echo $value['BdId'] ?> </td>
        <td id="tdTitre<?php echo $idlivre; ?>" style="text-align: center;"> <?php echo $value['BdTitre'] ?> </td>
        <td id="tdTome<?php echo $idlivre; ?>" style="text-align: center;"> <?php echo $value['BdTome'] ?> </td>
        <td id="tdParution<?php echo $idlivre; ?>" style="text-align: center;"> <?php echo $value['BdParution'] ?> </td>
        <td id="tdSerie<?php echo $idlivre; ?>" style="text-align: center;"> <?php echo $value['SerieNom'] ?> </td>
        <td id="tdEditeur<?php echo $idlivre; ?>" style="text-align: center;"> <?php echo $value['EditeurNom'] ?> </td>
        <td style="text-align: center;"><button type="button" class="btn btn-info" onclick="modifFormulaireLivres(<?php echo $idlivre.",'".$titre."','".$tome."','".$parution."','".$serie."','".$editeur."'"; ?>)">Modifier</button></td>
        <td style="text-align: center;"><button type="button" class="btn btn-info" onclick="supprLivre(<?php echo $idlivre; ?>)">Supprimer</button></td>
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
</div> <!-- listingBooks -->

<!-- FIN BLOC D'INSTRUCTION LISTING -->

</div> <!-- .container pour les livres -->
