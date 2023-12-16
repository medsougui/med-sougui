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
            text-align: center; /* Center-align text in cells */
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
        }
    </style>
    <title>Your Page Title</title>
</head>
<body>

<?php
require_once('../controllers/tablecontroller.php');
require_once('../models/table.php');
$tabctr = new tablecontroller();
$res = $tabctr->liste();
?>

<table>
    <tr>
        <td>num</td>
        <td>client</td>
        <td>mode</td>
        <td>action</td>
    </tr>

    <?php foreach ($res as $row): ?>
        <tr>
            <form action="cancelres.php" method="post">
            <td><?php echo $row['num']; ?></td>
            <td><?php echo $row['client']; ?></td>
            <td style="background-color: <?php echo $row['mode'] == 'r' ? 'red' : 'green'; ?>">
                <?php echo $row['mode']; ?>
            </td>
            <td>
                <input type="hidden" name="num" value="<?php echo $row['num'];; ?>">
            <input type="submit" value="cancel"></td>
            </form>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
