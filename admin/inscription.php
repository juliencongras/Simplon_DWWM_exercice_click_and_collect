<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription admin</title>
</head>
<body>
    <form action="addAdmin.php" method="post">
        Identifiant : <input type="text" name="login">
        Mot de passe : <input type="password" name="password">
        Confirmation mot de passe : <input type="password" name="passwordCheck">
        <button>Envoyer</button>
    </form>
    <a href="login.php">Connexion</a>
    <a href="../index.php">Retour sur le site.</a>
</body>
</html>