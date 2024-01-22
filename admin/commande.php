<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes</title>
    <link rel="stylesheet" href="../cnc.css">
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
        <a href="../index.php">Retour sur le site.</a>
        <div id="allthecommandes">
            <?php
            require('../pdo.php');

            $req = $pdo->query('select * from commande;');
            $mesInfos = $req->fetchAll();

            foreach($mesInfos as $cmd){
                if($cmd['id_client'] != NULL){
                    $req = $pdo->query("select * from client where id=${cmd['id_client']};");
                    $client = $req->fetch();
                }else{
                    $client = [
                        "id" => '',
                        "nom" => "",
                        "tel" => '',
                        "mail" => ''
                    ];
                }
            ?>

            <div class="maincommand">
                <div>
                    <span><span class="infoclientsadmin">ID : </span><?= $cmd['id'] ?></span>
                    <span><span class="infoclientsadmin">Nom : </span><?= $client['nom'] ?></span>
                    <span><span class="infoclientsadmin">Mail : </span><?= $client['mail'] ?></span>
                    <span><span class="infoclientsadmin">Téléphone : </span><?= $client['tel'] ?></span>
                </div>
            <div>
            <?php
            $req = $pdo->prepare('select * from produit_commande where id_commande = ?;');
            $req->execute([$cmd['id']]);
            $mesInfos = $req->fetchAll();
            
            $total = 0;
            
            foreach($mesInfos as $data){
                $prod = $pdo->query("select * from produit where id = ${data['id_produit']};")->fetch();
                $total += $prod['prix'];
            ?>
                <li>
                <?= $prod['nom'] ?> : <?= $prod['prix'] ?>€
                </li>

            <?php } ?>
            </ul>
            <span class="infoclientsadmin">TOTAL : <?= $total ?>€</span>
            Etat commande : <?= $cmd['etat'] ?>
            <?php
            if($cmd['etat'] != 'panier'){
                ?>
                <a href="changerEtat.php?id=<?= $cmd['id'] ?>">OK</a>
                <a href="annulercommande.php">Annuler la commande</a>
            <?php
                }
            ?>
                    </div>
                </div>
                <?php } ?>
        </div>
        
</body>
</html>