<?php
require_once('../controllers/ingredientcontroller.php');
require_once('../models/ingredient.php');

$x = $_POST['x'];
$l = $_POST['list'];
$ingredientController = new ingredientController();
$res = $ingredientController->cherche($l,$x);

    if ($res) {
        echo "<table border=1>";
        echo "<tr><th>code</th><th>name</th><th>qte</th><th>location</th></tr>";

        while ($t = $res->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $t['code'] . "</td>";
            echo "<td>" . $t['name'] . "</td>";
            echo "<td>" . $t['qte'] . "</td>";
            echo "<td>" . $t['location'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No results found.";
    }
?>
