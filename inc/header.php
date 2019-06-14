<?php
if(session_status() == PHP_SESSION_NONE){
session_start();
}
if (!empty($_POST)) {
	$_SESSION["formulaire_envoye"] = $_POST;
	header("Location: ".$_SERVER["PHP_SELF"]);
	exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="css/app.css" rel="stylesheet">
    <link href="css/overrideBootstrap.css" rel="stylesheet">

    <title>Mediatheque</title>

<!-- <script src="jquery-3.4.1.min.js"></script> -->

</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Mediatheque LesMotsTordus</a>

    <!-- <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <?php if (isset($_SESSION['auth'])): ?>
                <li class="nav-item active"><a href="logout.php">Deconnexion</a></li>
            <?php else: ?>

                <li class="nav-item active">
                <a href="login.php">Deconnexion</a>
            </li>
                 <span class="sr-only">(current)</span>
        <?php endif; ?>
        </ul>
    </div> -->
</nav>
