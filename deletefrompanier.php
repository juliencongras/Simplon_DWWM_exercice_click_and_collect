<?php
$id_prod = $_POST['id_produit'];
$id_cmd = $_POST['id_commande'];

include_once "pdo.php";

/*$req = $pdo->prepare('INSERT INTO produit (nom, description, prix, image, mp3) VALUES (?,?,?,?,?);');
$req->execute([$nom, $description, $prix, $image, $mp3]);*/

/*produit_commande <- tableau
id_commande,id_produit <- colonnes*/
$req = $pdo->prepare("delete from produit_commande where id_produit=? && id_commande=?;");
$req->execute([$id_prod, $id_cmd]);

header("location: validation.php");