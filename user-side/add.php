<?php
require_once('../controllers/ingredientcontroller.php');
require_once('../models/ingredient.php');
    $code = $_POST['c'];
    $name = $_POST['n'];
    $location = $_POST['loc'];
    $quantity = $_POST['q'];
    $ingredient = new ingredient($code, $name, $quantity, $location);
    $ingredientController = new ingredientController();
    $result = $ingredientController->insert($ingredient);

    if ($result) {
        echo "Ingredient added successfully!";
        } 
    else {
        echo "Failed to add ingredient.";
    }

?>
