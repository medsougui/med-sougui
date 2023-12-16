<?php
require_once('../controllers/UtilisateurController.php');
require_once('../models/Utilisateur.php');

    if (isset($_POST['id'])) {
        $userId = $_POST['id'];
        $utilisateurController = new UtilisateurController();
        $deleted = $utilisateurController->delete($userId);

        if ($deleted) {
            header('Location: users.php' );
        } else {
            echo "Error deleting user with ID $userId.";
        }
    } else {
        echo "Invalid request. Please provide a user ID.";
    }
?>
