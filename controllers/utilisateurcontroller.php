<?php
include_once('../models/utilisateur.php');
include_once('../database/config.php');

class UtilisateurController extends Connexion {
    function __construct() {
        parent::__construct();
    }

    function insert(Utilisateur $utilisateur) {
        $query = "INSERT INTO utilisateur(nom, prenom, email, pwd, tele, role ) VALUES (?, ?, ?, ?, ?, ?)";
        $res = $this->pdo->prepare($query);

        $array = array(
            $utilisateur->getNom(),
            $utilisateur->getPrenom(),
            $utilisateur->getEmail(),
            $utilisateur->getPwd(),
            $utilisateur->getTele(),
            $utilisateur->getRole()
        );

        return $res->execute($array);
    }

    function getUtilisateur($email) {
        $query = "SELECT nom,prenom, email, pwd, tele, role FROM utilisateur WHERE email = ?";
        $res = $this->pdo->prepare($query);
        $res->execute(array($email));
        $array = $res->fetch();
        return $array;
    }
    function doesUserExist($email) {
        $query = "SELECT COUNT(*) FROM utilisateur WHERE email = ?";
        $res = $this->pdo->prepare($query);
        $res->execute(array($email));
        $count = $res->fetchColumn();
        return $count > 0; 
    }

    function delete($id) {
        $query = "DELETE FROM utilisateur WHERE id=?";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($id));
    }

    function liste() {
        $query = "SELECT * FROM utilisateur ";
        $res = $this->pdo->prepare($query);
        $res->execute();
        return $res;
    }
}
?>
