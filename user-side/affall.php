<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        table {
            margin-top: 20px;
            width: 500px;
            text-align: center;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
        }
    </style>
<?php
require_once('../controllers/ingredientController.php');
$controller = new ingredientController();
$ingredientsList = $controller->liste();
if ($ingredientsList->rowCount() > 0) {
    echo "<table border=1>";
    echo "<tr><th>code</th><th>name</th><th>qte</th><th>location</th></tr>";

    while ($ingredient = $ingredientsList->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $ingredient['code'] . "</td>";
        echo "<td>" . $ingredient['name'] . "</td>";
        echo "<td>" . $ingredient['qte'] . "</td>";
        echo "<td>" . $ingredient['location'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No data found.";
}
?>
