
<div class="container">

  <h2>Liste des livres</h2>
  <input type="button" class="btn btn-info" value="Mettre a jour la base">

  <button type="button" class="btn btn-primary">Ajouter un Livre</button>
  <br/>
  <br/>
  <input type="button" value="Montrer/Cacher Liste" class="btn btn-info">

  <div id="demo" class="collapse">
    <?php


    try{
    // $sql = 'SELECT BdTitre, BdImage, BdParution, BdFormat, NumSerie, NumEditeur FROM bd ORDER BY NumSerie';
    // $res2 = $pdo->query($sql);
    // $res = $res2->fetchAll(PDO::FETCH_ASSOC);

    ?> <table style="width:100%">
      <tr>
        <th style="text-align: center;">Titre</th>
        <th style="text-align: center;">Date parution</th>
        <th style="text-align: center;">Format</th>
        <th style="text-align: center;">Serie</th>
        <th style="text-align: center;">Editeur</th>
        <th style="text-align: center;"></th>
        <th style="text-align: center;"></th>
        <th></th>
      </tr>
      <?php

    // foreach ($res as $key => $value) {
    //   ?>
    //   <tr>
    //     <td style="text-align: center;"> <?php echo $value['BdTitre'] ?> </td>
    //     <td style="text-align: center;"> <?php echo $value['BdParution'] ?> </td>
    //     <td style="text-align: center;"> <?php echo $value['BdFormat'] ?> </td>
    //     <td style="text-align: center;"> <?php
    //         $res2 = $pdo->prepare('SELECT SerieNom FROM serie WHERE SerieNum = ?');
    //         $res2->execute(array($value['NumSerie']));
    //         $res3 = $res2->fetchAll(PDO::FETCH_ASSOC);
    //         echo $res3[0]['SerieNom']; ?> </td>
    //     <td style="text-align: center;"> <?php
    //         $res2 = $pdo->prepare('SELECT EditeurNom FROM editeur WHERE EditeurNum = ?');
    //         $res2->execute(array($value['NumEditeur']));
    //         $res3 = $res2->fetchAll(PDO::FETCH_ASSOC);
    //         echo $res3[0]['EditeurNom'] ?> </td>
    //         <td style="text-align: center;"><button type="button" class="btn btn-info">Modifier</button></td>
    //         <td style="text-align: center;"><button type="button" class="btn btn-info">Supprimer</button></td>
    //         <td><br/><br/></td>
    //   </tr>
    //   <?php
    // }
  } catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
  }
    ?>
    </table>
  </div>
</div>  <!-- .container -->
<div class="container">

  <h2>Liste des Editeurs</h2>
  <input type="button" class="btn btn-info" value="Mettre a jour la base">

  <button type="button" class="btn btn-primary">Ajouter un Editeur</button>
  <br/>
  <br/>
  <input type="button" value="Montrer/Cacher Liste" class="btn btn-info">

  <div id="demo" class="collapse">
    <?php


    try{
    // $sql = 'SELECT BdTitre, BdImage, BdParution, BdFormat, NumSerie, NumEditeur FROM bd ORDER BY NumSerie';
    // $res2 = $pdo->query($sql);
    // $res = $res2->fetchAll(PDO::FETCH_ASSOC);

    ?> <table style="width:100%">
      <tr>
        <th style="text-align: center;">Titre</th>
        <th style="text-align: center;">Date parution</th>
        <th style="text-align: center;">Format</th>
        <th style="text-align: center;">Serie</th>
        <th style="text-align: center;">Editeur</th>
        <th style="text-align: center;"></th>
        <th style="text-align: center;"></th>
        <th></th>
      </tr>
      <?php

    // foreach ($res as $key => $value) {
    //   ?>
    //   <tr>
    //     <td style="text-align: center;"> <?php echo $value['BdTitre'] ?> </td>
    //     <td style="text-align: center;"> <?php echo $value['BdParution'] ?> </td>
    //     <td style="text-align: center;"> <?php echo $value['BdFormat'] ?> </td>
    //     <td style="text-align: center;"> <?php
    //         $res2 = $pdo->prepare('SELECT SerieNom FROM serie WHERE SerieNum = ?');
    //         $res2->execute(array($value['NumSerie']));
    //         $res3 = $res2->fetchAll(PDO::FETCH_ASSOC);
    //         echo $res3[0]['SerieNom']; ?> </td>
    //     <td style="text-align: center;"> <?php
    //         $res2 = $pdo->prepare('SELECT EditeurNom FROM editeur WHERE EditeurNum = ?');
    //         $res2->execute(array($value['NumEditeur']));
    //         $res3 = $res2->fetchAll(PDO::FETCH_ASSOC);
    //         echo $res3[0]['EditeurNom'] ?> </td>
    //         <td style="text-align: center;"><button type="button" class="btn btn-info">Modifier</button></td>
    //         <td style="text-align: center;"><button type="button" class="btn btn-info">Supprimer</button></td>
    //         <td><br/><br/></td>
    //   </tr>
    //   <?php
    // }
  } catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
  }
    ?>
    </table>
  </div>
</div>  <!-- .container -->


  <div class="container">
      <h2>Question</h2>

        <input type="button" class="btn btn-info" value="Ajouter une nouvelle question">

        <button type="button" class="btn btn-primary">Valider</button>
        <br/>
        <br/>

          <form name="FormulaireUtilisateurs" action="/" onsubmit="return validateFormUtilisateurs()" method="post" >
            <div class="form-group">
              Question: <input type="text" name="nom"><br/>
              Choix1: <input type="text" name="prenom"><br/>
              Choix2: <input type="text" name="rue"><br/>
              Choix3: <input type="text" name="cp"><br/>
              Reponse: <input type="text" name="ville"><br/>
              Categorie:   <input type="text" name="datenaissance"><br/>
              <input type="submit" value="Ajouter">
            </div> <!-- form-group -->
          </form> <!-- .myForm -->
    </div>  <!-- .container -->
