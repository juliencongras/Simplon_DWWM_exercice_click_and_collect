<?php
include_once "../pdo.php";
include_once "../debug.php";

$login = $_POST["login"];
$pwd = $_POST["password"];
$pwdCheck = $_POST["passwordCheck"];

$req = $pdo->prepare('select * from admin_info where name = ?;');
$req->execute([$login]);
$UserExistCheck = $req->fetch();

if($UserExistCheck){
    ?><p>Ce nom d'utilisateur existe déjà, veuillez en choisir un autre. 
        <a href="inscription.php">Retour à l'inscription</a>
        </p><?php
}

else if($pwd != $pwdCheck){?>
    <p>Les mots de passe ne sont pas identique. <a href="inscription.php">Retour</a></p>
    <?php
}

else{
    $password = password_hash($pwd, PASSWORD_DEFAULT);

    $reqRegister = $pdo->prepare('INSERT INTO admin_info (name, password) VALUES (?,?);');
    $reqRegister->execute([$login, $password]);
    
    session_start();
    
    $_SESSION["admin"] = true;
    
    header('location: ../index.php');
}

?>