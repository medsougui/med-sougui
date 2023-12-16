<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["numbers"])) {
    $selectedNumbers = $_GET["numbers"];
    $conn = new mysqli("localhost", "root", "", "stock");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

$sql = "UPDATE `tab` SET `mode` = 'r', `client` = '" . $_SESSION['userc'] . "' WHERE `num` IN ($selectedNumbers)";

    if ($conn->query($sql) === TRUE) {
        header('Location: conf.php');
    } else {
        echo "Error updating mode: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
