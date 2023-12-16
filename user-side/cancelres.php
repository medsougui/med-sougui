<?php
require_once('../controllers/tablecontroller.php');
require_once('../models/table.php');
require_once('../database/config.php');
    $num = $_POST['num'];
    $tableController = new tablecontroller();
    $table = new table($num, 'f');
    $tableController->modifyTable($table);
    header('Location: reserv.php' );

?>
