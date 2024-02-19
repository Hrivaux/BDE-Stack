<?php
session_start();
require_once '../DatabaseConnection.php'; // Assurez-vous d'avoir inclus le fichier contenant la classe de connexion à la base de données

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Connexion à la base de données
    $database = new DatabaseConnection('mysql-hubin.alwaysdata.net', 'hubin_bde', 'hubin', 'HubinSQL2022!');
    $bdd = $database->connect();

    $check = $bdd->prepare('SELECT email, password, prenom FROM users WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();
    if ($row == 1) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['user'] = $data['email'];
            header('Location: ../../accueil.php');
        } else {
            header('Location: ../../index.php?login_err=email');
        }
    } else {
        header('Location: ../../index.php?login_err=email');
    }
} else {
    header('Location: ../../index.php?login_err=champs');
}
?>
