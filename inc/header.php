<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Mediatheque</title>


    <!-- Custom styles for this template -->
    <link href="css/app.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Mediatheque LesMotsTordus</a>


    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <?php if (isset($_SESSION['auth'])): ?>
                <li class="nav-item active"><a href="logout.php">Deconnexion</a></li>
            <?php else: ?>
            <li class="nav-item active">
                <a href="register.php">Inscription</a>
            </li><br />
                <li class="nav-item active">
                <a href="login.php">Connexion</a>
            </li>
                <!-- <span class="sr-only">(current)</span>-->
        <?php endif; ?>
        </ul>
        

    </div>
</nav>
<div class="container">

<?php if(isset($_SESSION['flash'])): ?><!--si on a quelque chose dans cette clef flash
    <?php foreach($_SESSION['flash'] as $type => $message): ?>on va parcourir cet element avec le foreach et on recupere en clef le type et en valeur le message-->
     <div class="alert alert-<?= $type; ?>"> <!--div avec une classe alerte qui affiche le type-->
        <?= $message; ?> <!--cela gere un message, c'est une astuce en peu de lignes-->
     </div>
    <?php endforeach; ?>
    <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>
