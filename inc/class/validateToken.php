<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php'; 
require_once 'user.php';
require_once '../mail/mailer.php';
require_once('../../global.php');

$user = new User($bdd);

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    try {
        $validatedUser = $user->validateToken($token);

        // Envoi d'un e-mail aux administrateurs après la validation réussie
        $mailer = new PHPMailer(true);
        $mail = new Mailer($mailer);

        // Sélectionner tous les administrateurs
        $adminQuery = $bdd->prepare("SELECT email FROM users WHERE id_grade = 3");
        $adminQuery->execute();
        $admins = $adminQuery->fetchAll(PDO::FETCH_ASSOC);

        foreach ($admins as $admin) {
            $mail->sendNotificationEmail($admin['email'], "Nouvelle Inscription Confirmée", "Une nouvelle inscription a été confirmée. Nom : {$validatedUser['nom']}, Email : {$validatedUser['email']}");
        }

        echo "Votre compte a été activé avec succès. Vous pouvez maintenant vous connecter.";
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "Aucun token de validation fourni.";
}


?>