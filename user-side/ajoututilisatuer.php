<?php
session_start();
require_once('../controllers/utilisateurcontroller.php');
require_once('../models/utilisateur.php');
$nom=$_POST['name'];
$prenom=$_POST['prenom'];
$tele=$_POST['tel'];
$email=$_POST['email'];
$pwd=$_POST['pwd'];
$role='user';
$_SESSION['err1']=false;
$utilisateur=new utilisateur($nom,$prenom,$email,$pwd,$tele,$role);
$utilisateurCtr=new utilisateurcontroller();
if (!$utilisateurCtr->doesUserExist($email)) {
    $res = $utilisateurCtr->insert($utilisateur);
    if ($res == true) {
        header('Location: index.php');
        $_SESSION['err1']=false;
        exit();
    } else {
        $_SESSION['msg'] = "Registration failed. Please try again.";
        $_SESSION['err1']=true;
        header('Location: index.php' );
        exit();
    }
} else {
    $_SESSION['msg'] = "User with email already exists";
    $_SESSION['err1']=true;
    header('Location: index.php' );
    exit();
}
?>