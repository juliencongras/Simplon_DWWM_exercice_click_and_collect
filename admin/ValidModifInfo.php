<?php

session_start();
if(! $_SESSION['admin']){
    header("location: ../index.php"); 
    die;
}

session_start();

    if( isset($_POST['adresse']) 
    &&  isset($_POST['telephone']) 
    && isset($_POST['horaire'])
    ){
        $adresse = $_POST['adresse'];
        $telephone = $_POST['telephone'];
        $horaire = $_POST['horaire'];
        $id = $_POST['id'];

        include('../pdo.php');

        $req = $pdo->prepare('update information set adresse=?, telephone=?, horaire=? where id=?;');
        $req->execute([$adresse, $telephone, $horaire, $id]);
    }
    header('location: ../index.php');

?>