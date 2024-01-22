<?php
        include_once "pdo.php";

        //$req = $pdo->query('select * from produit_commande where id_commande= ?;');
        //$req->execute([$_COOKIE['id_cmd']]);
        //$mesInfos = $req->fetchAll();

        $req = $pdo->prepare('select * from produit_commande where id_commande = ?;');
        $req->execute([$_COOKIE['id_cmd']]);
        $mesInfos = $req->fetchAll();

        $nombrepanier = 0;

        foreach($mesInfos as $data){
    ?>
    <?php $nombrepanier += 1 ?>
    <?php } ?>
<div id="headercenter">
    <div id="header">
        <h1><a href="index.php">🥁 Les cymballes à Toto!</a></h1>
        <a href="panier.php">🛍 Boutique</a>
        <a href="validation.php">🛒 Panier (<?= $nombrepanier ?>)</a>
        <?php if ($_SESSION["admin"] === TRUE){?>
            <a href="admin/commande.php">📋 Commandes</a>
            <a href="admin/logout.php">Déconnexion</a>
        <?php } ?>
    </div>
</div>