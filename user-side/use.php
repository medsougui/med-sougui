<?php
$cx = mysqli_connect('localhost', 'root', '', 'stock');
if (!$cx) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $x = mysqli_real_escape_string($cx, $_POST['x']);  // Use mysqli_real_escape_string to prevent SQL injection
    $n = mysqli_real_escape_string($cx, $_POST['n']);
    $l = mysqli_real_escape_string($cx, $_POST['list']);

    $req = "SELECT qte FROM ingredient WHERE $l='$x'";
    $res = $cx->query($req);

    if ($res) {
        $row = $res->fetch_assoc();
        $currentQuantity = $row['qte'];

        if ($_POST['action'] == 'add') {
            if($n>0){
            if ($currentQuantity + $n < 100) {
                echo "ajouter avec succes";
                $newQuantity = $currentQuantity + $n;
                $res2 = "UPDATE ingrediant SET qte = '$newQuantity' WHERE $l='$x'";
                $cx->query($res2);
            } else {
                echo "Quantity exceeds the limit.";
            }
        }
        else {
            echo "you cant add a negative number.";
        }
        } elseif ($_POST['action'] == 'use') {
            if($n>0){
            if ($currentQuantity - $n >= 0) {
                echo "use avec succes";
                $newQuantity = $currentQuantity - $n;
                $res2 = "UPDATE ingrediant SET qte = '$newQuantity' WHERE $l='$x'";
                $cx->query($res2);
            } else {
                echo "Not enough quantity available to use.";
            }}
            else {
                echo "you cant use a negative number.";
            }
        }
    } else {
        echo "Error in the query: " . $cx->error;
    }
}

mysqli_close($cx);
?>
