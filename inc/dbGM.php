<?php
/**
 * Created by PhpStorm.
 * User: pplaud
 * Date: 07/12/2017
 * Time: 10:02
 */

//host is localhost parce que le serveur de BDD est sur le meme serveur que l'interpreteur web. (du coup on y indique pas l'adresse ip ou le domaine)
$user = 'phpmyadmin';
$mdp = '';
$pdoGM = new PDO('mysql:host=localhost;dbname=GestionMediatheque', $user, $mdp);

$pdoGM->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //rapport d'erreur
$pdoGM->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$pdoGM->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); //definit le mode de recuperation par defaut.
?>
