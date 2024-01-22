<?php
include_once "../pdo.php";

$login = $_POST["login"];
$pwd = $_POST["password"];

$req = $pdo->prepare('select * from admin_info where name = ?;');
$req->execute([$login]);
$loginCheck = $req->fetch(); 
    
if($loginCheck){
    $hashPass = $loginCheck["password"];
    if(password_verify($pwd, $hashPass)){
        session_start();
    
        $_SESSION["admin"] = true;

        header('location: ../index.php');
    }
}
else{
    ?><p>Mauvais identifiants. <a href="login.php">Retour</a></p><?php
}

?>