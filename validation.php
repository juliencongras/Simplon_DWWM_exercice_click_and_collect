<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation</title>
    <link rel="stylesheet" href="cnc.css">
</head>
<body>
    <?php include_once "header.php" ?>
    <?php
    $req = $pdo->prepare('select * from produit_commande where id_commande = ?;');
    $req->execute([$_COOKIE['id_cmd']]);
    $mesInfos = $req->fetchAll();
    
    $total = 0; ?>
    <div id="everythingpanier">
        <div id="mainpanier">
            <?php
            foreach($mesInfos as $data){
                $prod = $pdo->query("select * from produit where id = ${data['id_produit']};")->fetch();
                $total += $prod['prix'];
            ?>

                <form class="produitspanier" action="deletefrompanier.php" method="post">
                    <img class="imgpaniervalidation" src="<?= $prod['image'] ?>" alt="">
                    <span class="textpaniervalidation"><?= $prod['nom'] ?></span> <?= $prod['prix'] ?>€
                    <input type="hidden" name="id_produit" value="<?= $data['id_produit'] ?>">
                    <input type="hidden" name="id_commande" value="<?= $_COOKIE['id_cmd'] ?>">
                    <button>❌</button>
                </form>
                <?php } ?>

                <p id="prixtotalpanier"><span class="textpaniervalidation">TOTAL : </span><?= $total ?>€</p>         
        </div>

        <form id="formpanier" action="validation-panier.php" method="post">
                <input type="text" name="nom" placeholder="nom">
                <input type="email" name="mail" placeholder="mail">
                <input type="tel" name="tel" placeholder="telephone">
                <?php foreach($mesInfos as $data){?>
                    <input type="hidden" name="id_produit" value="<?= $data['id_produit'] ?>">
                <?php } ?>
                <input type="submit" value="Valider">
        </form>
    </div>
</body>
</html>