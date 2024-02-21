<?php
session_start();
require_once '../DatabaseConnection.php';

// Vérifier si l'utilisateur est connecté et a un email validé
if (isset($_SESSION['user'])) {
    $email = $_SESSION['user'];

    // Ajout d'une vérification pour le champ 'validate' dans la requête
    $check_user = $bdd->prepare('SELECT id_grade, validate FROM users WHERE email = ?');
    $check_user->execute(array($email));
    $user_data = $check_user->fetch();

    // Vérifier si l'email a été validé
    if ($user_data['validate'] == 1) {
        $grade_encours = $user_data['id_grade'];

        // Vérifier si l'utilisateur est administrateur et si le chemin contient "/Administration"
        if ($grade_encours >= 2 && strpos($_SERVER['REQUEST_URI'], "/administration") !== false) {
            header('Location: /administration/accueil.php');
            exit();
        }
    } else {
        // Si l'email n'est pas validé, rediriger l'utilisateur avec un message d'erreur
        header('Location: ../../index.php?login_err=email_non_valide');
        exit();
    }
}

// Vérifier les informations de connexion
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Connexion à la base de données

    // Ajout d'une vérification pour le champ 'validate' dans la requête
    $check = $bdd->prepare('SELECT email, password, prenom, validate FROM users WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    if ($row == 1) {
        if ($data['validate'] == 1) { // Vérifier si l'email a été validé
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
            // Si l'email n'est pas validé, rediriger l'utilisateur avec un message d'erreur
            header('Location: ../../index.php?login_err=email_non_valide');
        }
    } else {
        header('Location: ../../index.php?login_err=email');
    }
} else {
    header('Location: ../../index.php?login_err=champs');
}
?>
