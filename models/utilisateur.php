<?php

class Utilisateur {
    private $nom, $prenom, $email, $pwd, $tele, $role;

    function __construct( $nom = "", $prenom = "", $email = "", $pwd = "", $tele = "", $role = "") {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->tele = $tele;
        $this->role = $role;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPwd() {
        return $this->pwd;
    }

    public function getTele() {
        return $this->tele;
    }

    public function getRole() {
        return $this->role;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPwd($pwd) {
        $this->pwd = $pwd;
    }

    public function setTele($tele) {
        $this->tele = $tele;
    }

    public function setRole($role) {
        $this->role = $role;
    }
}
?>
