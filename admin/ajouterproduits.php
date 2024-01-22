<!DOCTYPE html>
<?php
session_start();
if(! $_SESSION['admin']){
    header("location: ../index.php"); 
    die;
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit.</title>
</head>
<body>
    <?php session_start();?>
        <a href="../index.php">Retour sur le site.</a>
        <form action="ajouterproduitscheck.php" enctype="multipart/form-data" method="post">
            Nom : <input type="text" name="nom">
            Description : <input type="text" name="description">
            Prix : <input type="number" name="prix" step="0.01" min="0">
            Image : <input type="file" name="image">
            Son : <input type="file" name="mp3">
            <button>Ajouter</button>
        </form>
</body>
</html>