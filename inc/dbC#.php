<?php

//host is localhost parce que le serveur de BDD est sur le meme serveur que l'interpreteur web. (du coup on y indique pas l'adresse ip ou le domaine)
$user = 'phpmyadmin';
$mdp = '';
$pdoC = new PDO('mysql:host=localhost;dbname=mottordus_2018_iscb', $user, $mdp);

$pdoC->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //rapport d'erreur
$pdoC->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$pdoC->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); //definit le mode de recuperation par defaut.
?>
