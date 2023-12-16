<?php
require_once('../controllers/ingredientcontroller.php');
require_once('../models/ingredient.php');
$x=$_POST["x"];
$list=$_POST['list'];
$ingredientController = new ingredientController();
$result = $ingredientController->delete($list,$x);
if ($result) {
    echo "Ingredient delete successfully!";
    exit();
    } 
else {
    echo "Failed to delete ingredient.";
}



?>