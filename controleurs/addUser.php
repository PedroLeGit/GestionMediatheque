<!-- BLOC D'INSTRUCTION POUR AJOUTER UN UTILISATEUR -->

<script>
//CONTROLE LES DONNEES DU FORMULAIRE AJOUT UTILISATEURS
//https://www.w3schools.com/js/js_validation.asp
function ajoutUtilisateurs() {
  var nom = document.forms["FormulaireUtilisateurs"]["nom"].value;
  var prenom = document.forms["FormulaireUtilisateurs"]["prenom"].value;
  var rue = document.forms["FormulaireUtilisateurs"]["rue"].value;
  var codepostal = document.forms["FormulaireUtilisateurs"]["codepostal"].value;
  var ville = document.forms["FormulaireUtilisateurs"]["ville"].value;
  var datenaissance = document.forms["FormulaireUtilisateurs"]["datenaissance"].value;
  var mail = document.forms["FormulaireUtilisateurs"]["mail"].value;
  var dateinscription = document.forms["FormulaireUtilisateurs"]["dateinscription"].value;

  if (nom == "" || prenom == "" || rue == "" || codepostal == "" ||
  ville == "" || datenaissance == "" || mail == "" || dateinscription == "" ) {
    alert("L'un des champs est vide");
    return false;
  }
}
</script>

<?php
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
    $sql2->execute([$_POST['nom'], $_POST['prenom'], $_POST['rue'], $_POST['cp'], $_POST['ville'], $_POST['datenaissance'], $_POST['mail'], $_POST['dateinscription']]);

  }
}
?>
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

<!-- FIN BLOC D'INSTRUCTION POUR AJOUTER UN UTILISATEUR -->
