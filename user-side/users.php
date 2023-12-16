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
    <title>Your Page Title</title>
</head>
<body>

<?php
require_once('../controllers/UtilisateurController.php');
require_once('../models/Utilisateur.php');
require_once('../database/config.php');

$utilisateurController = new UtilisateurController();
$res_users = $utilisateurController->liste();
?>

<table>
    <tr>
        <td>id</td>
        <td>nom</td>
        <td>prenom</td>
        <td>email</td>
        <td>tele</td>
        <td>role</td>
        <td>action</td>
    </tr>

    <?php foreach ($res_users as $row_user): ?>
        <tr>
            <form action="deleteuser.php" method="post">
            <td><?php echo $row_user['id']; ?></td>
            <td><?php echo $row_user['nom']; ?></td>
            <td><?php echo $row_user['prenom']; ?></td>
            <td><?php echo $row_user['email']; ?></td>
            <td><?php echo $row_user['tele']; ?></td>
            <td><?php echo $row_user['role']; ?></td>
            <td><input type="hidden" name="id" value="<?php echo $row_user['id']; ?>">
            <input type="submit" value="supp"></td>
            </form>
        </tr>
    <?php endforeach; ?>
        <tr >
            <td colspan="7">
            <a href="adduser.html"><input type="button" value="add"></a>
            </td>
        </tr>
</table>

</body>
</html>
