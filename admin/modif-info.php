<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier information</title>
</head>
<body>
    <?php
    session_start();
    if(! $_SESSION['admin']){
        header("location: ../index.php"); 
        die;
    }
    ?>
    <?php session_start();?>
        <?php require('../pdo.php'); 
        $req = $pdo->query('select * from information;');
        $information = $req->fetchAll();?>

        <form action="ValidModifInfo.php" method="post">
            Adresse : <input type="text" size="30" name="adresse" value="<?= $information[0]['adresse'] ?>">
            Telephone : <input type="text" size="7" name="telephone" value="<?= $information[0]['telephone'] ?>">
            Horaires : <input type="text" size="30" name="horaire" value="<?= $information[0]['horaire'] ?>">
            <input type="hidden" name="id" value="<?= $information[0]['id'] ?>">
            <button>Modifier</button>
        </form>
</body>
</html>