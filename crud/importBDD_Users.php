<?php

//MET A JOUR LA TABLE utilisateurs DE LA BASE GestionMediatheque, AVEC LES DONNEES DE LA TABLE emprunteur DE LA BASE mottordus_2018_iscb

  require ('../inc/dbC#.php');
  require ('../inc/dbGM.php');

  try{
    //RECUPERE TOUTES LES DONNEES DANS LA BDD C#
    $sql = 'SELECT emp_num, emp_nom, emp_prenom, emp_date_naiss, emp_mail, emp_prem_adh FROM emprunteur';
    $res2 = $pdoC->query($sql);
    $resC = $res2->fetchAll(PDO::FETCH_ASSOC);

    //NOUS AVONS BESOIN DE COMPARER LES DONNEES DEJA PRESENTES OU NON DANS LA BASE WEB AFIN DE CREER UN TABLEAU FINAL NE COMPORTANT QUE LES NOUVELLES DONNEES
    //RECUPERE TOUTES LES DONNEES DANS LA BDD WEB
    $sql = 'SELECT old_emp_num, nom_utilisateur, prenom_utilisateur, datenaissance_utilisateur, mail_utilisateur, emp_prem_adh FROM utilisateurs';
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
        $sql2 = $pdoGM->prepare('INSERT INTO utilisateurs (old_emp_num, nom_utilisateur, prenom_utilisateur, mail_utilisateur, datenaissance_utilisateur, emp_prem_adh)
        VALUES (?,?,?,?,?,?)');
        $sql2->execute([$value['emp_num'], $value['emp_nom'], $value['emp_prenom'], $value['emp_mail'], $value['emp_date_naiss'], $value['emp_prem_adh']]);
      }
      echo 'false';
    }
  } catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
  }

//FIN BLOC MET A JOUR LA TABLE utilisateurs DE LA BASE GestionMediatheque, AVEC LES DONNEES DE LA TABLE emprunteur DE LA BASE mottordus_2018_iscb

 ?>
