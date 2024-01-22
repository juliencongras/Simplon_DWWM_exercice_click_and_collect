<?php session_start (); ?>
<?php
if( isset($_POST['id_prod']) 
){
    $id_cmd = $_COOKIE['id_cmd'];
    $id_prod = $_POST['id_prod'];

    include('pdo.php');

    // verif id commande
    if($id_cmd == ""){
        $req = $pdo->prepare('insert into commande() values ();');
        $req->execute();
        $id_cmd = $pdo->lastInsertId();
        setcookie("id_cmd", $id_cmd);
    }

    //// verif si déjà réservé
    //$ajoutenonreserve = $pdo->prepare('select * from produit_commande where id_produit = ? && ;');
    //$ajoutenonreserve->execute([$id_prod]);
    //$dejareserve = count($ajoutenonreserve->fetchAll());

    // verif si deja dedans
    $ajoutenon = $pdo->prepare('select * from produit_commande where id_commande = ? and id_produit = ?;');
    $ajoutenon->execute([$_COOKIE['id_cmd'], $id_prod]);
    $produitcookie = count($ajoutenon->fetchAll());
    //if($dejareserve > 0){
    //    echo 'Ce produit à déjà était réservé. ';
    //    echo '<a href="panier.php">Retour au site.</a>';}
    //else{
        if($produitcookie){
            echo 'Produit déjà ajouté dans le panier. ';
            echo '<a href="panier.php">Retour sur le site.</a>';
        }else{
            $req = $pdo->prepare('INSERT INTO produit_commande (id_commande,id_produit) VALUES (?,?);');
            $req->execute([$id_cmd, $id_prod]);
            header('location: panier.php');
        }
    //}
}
?>