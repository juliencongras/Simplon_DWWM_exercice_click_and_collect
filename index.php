<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cymbales</title>
    <link rel="stylesheet" href="cnc.css">
</head>
<body id="pageprincipale">
    <?php
        require('pdo.php');
        $req = $pdo->query('select * from information;');
        $information = $req->fetchAll();
    ?>
    <?php include_once "header.php" ?>
    <div id="presentation">
        <p><?= $information[0]['adresse'] ?></p>
        <p><?= $information[0]['telephone'] ?></p>
        <p><?= $information[0]['horaire'] ?></p>
        <?php if ($_SESSION["admin"] === TRUE){?>
            <a href="admin/modif-info.php">Modifier</a>
        <?php } ?>
    </div>
</body>
</html>