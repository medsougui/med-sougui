<?php
require_once('../controllers/ingredientcontroller.php');
require_once('../models/ingredient.php');
$x=$_POST["x"];
$list=$_POST['list'];
$ingredientController = new ingredientController();
$result = $ingredientController->drop();
if ($result) {
    echo "the table is empty";
    exit();
    } 
else {
    echo "Failed to delete .";
}



?>