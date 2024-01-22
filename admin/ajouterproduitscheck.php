<?php

session_start();
if(! $_SESSION['admin']){
    header("location: ../index.php"); 
    die;
}

    if( isset($_POST['nom']) 
    && isset($_POST['description']) 
    && isset($_POST['prix'])
    //&& isset($_POST['image'])
    //&& isset($_POST['mp3'])
    ){
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        //$image = $_POST['image'];
        //$mp3 = $_POST['mp3'];

    //if(isset($_FILES['image'])){
        $file_nameimg = $_FILES['image']['name'];
        $file_tmpimg = $_FILES['image']['tmp_name'];
        //$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
        move_uploaded_file($file_tmpimg,"../images/".$file_nameimg);
        $image = "images/".$file_nameimg;
    //}

    //if(isset($_FILES['mp3'])){
        $file_namemp3 = $_FILES['mp3']['name'];
        $file_tmpmp3 = $_FILES['mp3']['tmp_name'];
        //$file_ext=strtolower(end(explode('.',$_FILES['mp3']['name'])));
        move_uploaded_file($file_tmpmp3,"../cymbalsMP3/".$file_namemp3);
        $mp3 = "cymbalsMP3/".$file_namemp3;
    //}

        include('../pdo.php');

        $req = $pdo->prepare('INSERT INTO produit (nom, description, prix, image, mp3) VALUES (?,?,?,?,?);');
        $req->execute([$nom, $description, $prix, $image, $mp3]);

        header('location: ../panier.php');
    }

?>