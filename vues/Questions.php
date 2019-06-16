<?php

if (isset($_SESSION["formulaire_envoye"])) {
	$_POST = $_SESSION["formulaire_envoye"];
	unset($_SESSION["formulaire_envoye"]);
}

require ('inc/dbGM.php');
// var_dump($_POST);
if (!empty($_POST)){

		$libelle = $_POST['libelle'];
		$choix1 = $_POST['choix1'];
    $choix2 = $_POST['choix2'];
    $choix3 = $_POST['choix3'];
    $solution = $_POST['solution'];
    $categorie = $_POST['categorie'];

    $sql2 = $pdoC->prepare('INSERT INTO questions (libelle_question, choix1_question, choix2_question, choix3_question, solution_question, categorie_question)
    VALUES (?,?,?,?,?,?,?,?,?,?,?)');
    $exec = $sql2->execute([$libelle,$choix1,$choix2,$choix3,$solution,$categorie]);
  }

?>


<script>
function ajoutQuestion(){

}
</script>

<br/>
<br/>
<br/>
<div class="container">
  <h2>Ajouter une nouvelle question</h2>
<form name="FormulaireQuestion" action="/" onsubmit="return ajoutQuestion()" method="post">
  <div class="form-group">
    <label for="libelle">Libelle de la question</label>
    <input type="text" name="libelle" class="form-control" id="libelle" aria-describedby="libelle" placeholder="Libelle">
  </div>
  <div class="form-group">
    <label for="choix1">1er choix</label>
    <input type="text" name="choix1" class="form-control" id="choix1" aria-describedby="choix1" placeholder="Choix 1">
  </div>
  <div class="form-group">
    <label for="choix2">2eme choix</label>
    <input type="text" name="choix2" class="form-control" id="choix2" aria-describedby="choix2" placeholder="Choix 2">
  </div>
  <div class="form-group">
    <label for="choix3">3eme choix</label>
    <input type="text" name="choix3" class="form-control" id="choix3" aria-describedby="choix3" placeholder="Choix 3">
  </div>
  <div class="form-group">
    <label for="solution">Solution</label>
    <input type="text" name="solution" class="form-control" id="solution" aria-describedby="solution" placeholder="Solution">
  </div>

  <div class="form-group">
    <label for="categorie">Categorie</label>
   <select class="form-control" id="categorie" name="categorie">
     <option>BD</option>
     <option>MANGA</option>
     <option>COMICS</option>
   </select>
  </div>
  <button type="submit" class="btn btn-primary">Ajouter la question</button>
</form>
</div>

<?php header('Location: http://http://pedroperso.ovh/index.php', true, 303); ?>
