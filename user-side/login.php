<?php
require_once('../controllers/utilisateurcontroller.php');
require_once('../models/utilisateur.php');
$pwd = $_POST['pwd'];
$email = $_POST['email'];
$utilisateurCtr = new UtilisateurController();
$utilisateur = $utilisateurCtr->getUtilisateur($email);
session_start();
if($utilisateur['pwd']==$pwd){
    if ($utilisateur['role'] == 'admin') {
        $_SESSION["err"]=false;
        header('Location: stock.html');
    } elseif($utilisateur['role'] == 'user'){
        $_SESSION["userc"]=$email;
        $_SESSION["err"]=false;
        header('Location: conf.php');
    }
    else{
        $_SESSION["err"]=true;
        header('Location: index.php');
    }
}
else{
    $_SESSION["err"]=true;
    header('Location: index.php');
}
?>
