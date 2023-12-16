<?php
include_once('../models/table.php');
include_once('../database/config.php');

class tablecontroller extends Connexion {
    function __construct() {
        parent::__construct();
    }

    function insert(table $t) {
        $query = "INSERT INTO tab(num, mode) VALUES (?, ?)";
        $res = $this->pdo->prepare($query);

        $array = array($t->getnum(), $t->getmode());
        return $res->execute($array);
    }

    function getTable($num) {
        $query = "SELECT * FROM tab WHERE num = ?";
        $res = $this->pdo->prepare($query);
        $res->execute(array($num));
        $array = $res->fetch();
        return $array;
    }

    function delete($num) {
        $query = "DELETE FROM tab WHERE num=?";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($num));
    }

    function liste() {
        $query = "SELECT * FROM tab";
        $res = $this->pdo->prepare($query);
        $res->execute();
        return $res;
    }

    function modifyTable(table $t) {
        $sql = "UPDATE tab SET mode=? , `client` = NULL WHERE num=?  ";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(array($t->getmode(), $t->getnum()));
    }
}
?>
