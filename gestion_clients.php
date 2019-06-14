require 'inc/header.php'; ?>

    <h1>Gestion clients</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label for="">Liste des clients</label>
            <input type="text" name="username" class="form-control" required/>
        </div>

        <div class="form-group">
            <label for=""></label>
            <input type="password" name="password" class="form-control" required/>
        </div>
        <a href="forget.php"><br/>(Mot de passe oublie)</a><br />
        <br />
        <button type="submit" class="btn btn-primary">Connexion</button>

    </form>

<?php require 'inc/footer.php'; ?>
