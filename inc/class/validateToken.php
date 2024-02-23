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

        // Préparation de l'envoi de l'email
        $mailer = new PHPMailer(true);
        $mail = new Mailer($mailer);

        // Récupération des emails des administrateurs
        $adminQuery = $bdd->prepare("SELECT email FROM users WHERE id_grade = 3");
        $adminQuery->execute();
        $admins = $adminQuery->fetchAll(PDO::FETCH_COLUMN, 0); // Récupérer uniquement la colonne 'email'

        if ($admins) {
            // Préparation du sujet et du corps de l'email
            $subject = "Nouvelle Inscription Confirmée";
            $body = "Une nouvelle inscription a été confirmée. Nom : {$validatedUser['nom']}, Email : {$validatedUser['email']}";

            // Envoi de l'email aux administrateurs
            $mail->sendMultipleEmails($admins, $subject, $body);
        }

        echo "Votre compte a été activé avec succès. Vous pouvez maintenant vous connecter.";
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "Aucun token de validation fourni.";
}
?>
