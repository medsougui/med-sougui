<?php
include_once('../models/ingredient.php') ;
include_once('../database/config.php');
class ingredientController extends Connexion{
function __construct() {
parent::__construct();
}

function insert(ingredient $c){

$query="insert into ingredient(code,name,qte,location)values(?, ?, ?, ?)";
$res=$this->pdo->prepare($query);

$aryy =array($c->getcode(),$c->getname(),$c->getqte(),$c->getlocation()) ;
return $res->execute($aryy);

}
function drop()
{
    $query = "delete from ingredient ";
    $res=$this->pdo->prepare($query);
    return $res->execute();
}
function getingredient($code){
    $query="SELECT * FROM ingredient WHERE code = ? ";
    $res = $this->pdo->prepare($query);
    $res->execute(array($code));
    $array= $res->fetch();
    return $array;
}
function delete($list, $code) {
    $query = "DELETE FROM ingredient WHERE $list = ?";
    $res = $this->pdo->prepare($query);
    $result = $res->execute(array($code));

    return $result;
}
function liste(){
$query = "select * from ingredient";
$res=$this->pdo->prepare($query);
$res->execute();
return $res;
}
function cherche($l, $x) {

    $query = "SELECT * FROM ingredient WHERE $l = ?";
    $res = $this->pdo->prepare($query);
    $res->execute(array($x));
    return $res;
}

function modifier_ing(ingredient $c)
{
$sql = "UPDATE ingredient SET  name=?, qte=?,location=? WHERE code=?";
$stmt= $this->pdo->prepare($sql);
$stmt->execute(array($c->getname(),$c->getqte(),$c->getlocation(),$c->getcode()));
}
}
?>