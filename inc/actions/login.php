<?php
session_start();
require_once '../DatabaseConnection.php';

// Vérifier si l'utilisateur est connecté en tant qu'administrateur
if (isset($_SESSION['user'])) {
    // Récupérer le grade de l'utilisateur depuis la base de données
    $database = new DatabaseConnection('mysql-hubin.alwaysdata.net', 'hubin_bde', 'hubin', 'HubinSQL2022!');
    $bdd = $database->connect();

    $email = $_SESSION['user'];
    $check_grade = $bdd->prepare('SELECT id_grade FROM users WHERE email = ?');
    $check_grade->execute(array($email));
    $grade_data = $check_grade->fetch();
    $grade_encours = $grade_data['id_grade'];

    // Vérifier si l'utilisateur est administrateur et si le chemin contient "/Administration"
    if ($grade_encours >= 2 && strpos($_SERVER['REQUEST_URI'], "/administration") !== false) {
        header('Location: /administration/accueil.php');
        exit();
    }
}

// Vérifier les informations de connexion
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
?>
