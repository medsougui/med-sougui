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
require_once('../models/ingredient.php');

$controller = new ingredientController();
$x = $_POST['x'];
$l = $_POST['list'];

$ingredientList = $controller->cherche($l, $x);

if ($ingredientList->rowCount() > 0) {
    echo "<table border=1>";
    echo "<tr><th>code</th><th>name</th><th>qte</th><th>location</th></tr>";

    while ($row = $ingredientList->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['code'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['qte'] . "</td>";
        echo "<td>" . $row['location'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No data found.";
}
?>
