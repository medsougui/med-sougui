<?php
require_once('../controllers/UtilisateurController.php');
require_once('../models/Utilisateur.php');
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $tele = $_POST['tele'];
    $role = $_POST['role'];
    $utilisateurController = new UtilisateurController();
    $utilisateur = new Utilisateur($nom, $prenom, $email, $pwd, $tele, $role);
    $inserted = $utilisateurController->insert($utilisateur);
    if ($inserted) {
        header('Location: users.php' );
    } else {
        echo "Failed to add user.";
    } 
?>
