<?php

//MET A JOUR LA TABLE livres DE LA BASE GestionMediatheque, AVEC LES DONNEES DE LA TABLE bd DE LA BASE mottordus_2018_iscb

  require ('inc/dbC#.php');
  require ('inc/dbGM.php');

  try{
    //RECUPERE TOUTES LES DONNEES DANS LA BDD C#
    $sql = 'SELECT BdId, BdTitre, BdIsbn, BdTome, BdParution, BdNbPages, BdImage, BdCouleur, BdCommentaires, BdFormat, NumSerie, NumEditeur FROM bd';
    $res2 = $pdoC->query($sql);
    $resC = $res2->fetchAll(PDO::FETCH_ASSOC);

    //NOUS AVONS BESOIN DE COMPARER LES DONNEES DEJA PRESENTES OU NON DANS LA BASE WEB AFIN DE CREER UN TABLEAU FINAL NE COMPORTANT QUE LES NOUVELLES DONNEES
    //RECUPERE TOUTES LES DONNEES DANS LA BDD WEB
    $sql = 'SELECT BdId, BdTitre, BdIsbn, BdTome, BdParution, BdNbPages, BdImage, BdCouleur, BdCommentaires, BdFormat, NumSerie, NumEditeur FROM livres';
    $res2 = $pdoGM->query($sql);
    $res_tampon = $res2->fetchAll(PDO::FETCH_ASSOC);

    //SI LES DEUX TABLEAUX SONT IDENTIQUES, ON NE FAIT RIEN, SINON ON EXTRAIT LES DIFFERENCES
    if(array_diff_key($resC, $res_tampon) == array()){

      echo 'true';
    } else {

      //EXTRACTION DES DIFFERENCES
      $res_final_apres_comparaison = array_diff_key($resC, $res_tampon);
      //PREPARATION POUR INSERTION DANS LA BDD WEB AVEC LA/LES DIFFERENCES
      foreach ($res_final_apres_comparaison as $key => $value){
        $sql2 = $pdoGM->prepare('INSERT INTO livres (BdTitre, BdIsbn, BdTome, BdParution, BdNbPages, BdImage, BdCouleur, BdCommentaires, BdFormat, NumSerie, NumEditeur)
        VALUES (?,?,?,?,?,?,?,?,?,?,?)');
        $sql2->execute([$value['BdTitre'], $value['BdIsbn'], $value['BdTome'], $value['BdParution'], $value['BdNbPages'], $value['BdImage'], $value['BdCouleur'], $value['BdCommentaires'], $value['BdFormat'], $value['NumSerie'], $value['NumEditeur']]);
      }
      echo 'false';
    }
  } catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
  }

//FIN BLOC MET A JOUR LA TABLE livres DE LA BASE GestionMediatheque, AVEC LES DONNEES DE LA TABLE bd DE LA BASE mottordus_2018_iscb

?>
