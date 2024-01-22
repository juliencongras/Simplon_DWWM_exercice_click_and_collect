<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cymbales</title>
    <link rel="stylesheet" href="cnc.css">
</head>
<body>
    <?php include_once "header.php" ?>
    <div id="liste">
    <?php
        include_once "pdo.php";

        $req = $pdo->query('select * from produit;');
        $mesInfos = $req->fetchAll();

        foreach($mesInfos as $data){
    ?>

        <div class="produit">
            <img class="imageproduit" src="<?= $data['image'] ?>" alt="<?= $data['nom'] ?>">
            <div class="mainproduit">
                <div class="boutiqueproduittext">
                    <h2><?= $data['nom'] ?></h2>
                    <p><?= $data['description'] ?></p>
                </div>
                <div class="boutiqueproduitmisc">
                    <audio controls src="<?= $data['mp3'] ?>"></audio>
                    <h2><span><?= $data['prix'] ?></span>€</h2>
                    <form action="ajouter.php" method="post">
                        <input type="hidden" name="id_prod" value="<?= $data['id'] ?>">
                        <input type="submit" value="Ajouter au panier">
                    </form>
                </div>
            </div>
        </div>

    <?php } ?>
        <a href="validation.php">Valider mon panier</a>
        <?php if ($_SESSION["admin"] === TRUE){?>
            <a href="admin/ajouterproduits.php">Ajouter produit</a>
        <?php } ?>
    </div>
    <script src="cymbalsMP3/playsound.js"></script>
</body>
</html>