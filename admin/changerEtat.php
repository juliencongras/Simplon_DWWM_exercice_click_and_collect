<?php

session_start();
if(! $_SESSION['admin']){
    header("location: ../index.php"); 
    die;
}

session_start();

    $id_cmd = $_GET['id'];

    require('../pdo.php');

    $req= $pdo->query("select etat from commande where id = ${id_cmd};");
    $etat = $req->fetch()['etat'];

    switch($etat){
        case 'validée':
            $e = 'prete';
            break;
        case 'prete':
            $e = 'collectée';
            //Fonction d'envoie de mail
            break;
    }
    if(isset($e)){
        $req = $pdo->prepare('UPDATE commande set etat = ? where id = ?;');
        $req->execute([$e, $id_cmd]);
    }

    header('location: commande.php');?>