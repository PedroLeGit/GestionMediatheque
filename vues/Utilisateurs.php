<div class="container">
  <h2>Liste des utilisateurs</h2>

  <input type="button" class="btn btn-info" value="Mettre a jour la base" onclick="majUtilisateurs()">

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Ajouter un utilisateur</button>

<!-- APPEL FICHIER AJOUT UTILISATEUR -->
  <?php
  require ('addUser.php');
  ?>
<!-- APPEL FICHIER AJOUT UTILISATEUR -->

  <br/>
  <br/>

<!-- BLOC D'INSTRUCTION LISTING -->
<input type="button" value="Montrer/Cacher Liste" class="btn btn-info" onclick="collapseUtilisateurs()">

<div id="listingUsers" class="listingUsers">
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
