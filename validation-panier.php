<?php
if( isset($_POST['nom']) 
&&  isset($_POST['mail']) 
&& isset($_POST['tel'])
){
    $nom = $_POST['nom'];
    $mail = $_POST['mail'];
    $tel = $_POST['tel'];
    //$id_produit = $_POST['id_produit'];

    include('pdo.php');

    if($id_cmd == ""){
        $req = $pdo->prepare('insert into commande() values ();');
        $req->execute();
        $id_cmd = $pdo->lastInsertId();
        setcookie("id_cmd", $id_cmd);
    }

    $req = $pdo->prepare('INSERT INTO client (nom, mail, tel) VALUES (?,?,?);');
    $req->execute([$nom, $mail, $tel]);
    $id_client = $pdo->lastInsertId();
    $req = $pdo->prepare('UPDATE commande set id_client = ?, etat = "validée" where id = ?;');
    $req->execute([$id_client, $_COOKIE['id_cmd']]);
}
?>
Commande validée. <a href="index.php">Retour au site</a>