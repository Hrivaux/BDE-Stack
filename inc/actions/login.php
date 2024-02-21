<?php
session_start();
require_once '../DatabaseConnection.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Connexion à la base de données
    

    $check = $bdd->prepare('SELECT email, password, prenom FROM users WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();
    if ($row == 1) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Vérifier si le mot de passe correspond au hash stocké dans la base de données
            if (password_verify($password, $data['password'])) {
                $_SESSION['user'] = $data['email'];
                header('Location: ../../accueil.php');
            } else {
                header('Location: ../../index.php?login_err=password');
            }
        } else {
            header('Location: ../../index.php?login_err=email');
        }
    } else {
        header('Location: ../../index.php?login_err=email');
    }
} else {
    header('Location: ../../index.php?login_err=champs');
}
