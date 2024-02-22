<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require_once('../inc/DataBaseConnection.php');
require '../vendor/autoload.php'; 

// Connexion à la base de données
$database = new DatabaseConnection('mysql-hubin.alwaysdata.net', 'hubin_bde', 'hubin', 'HubinSQL2022!');
$bdd = $database->connect();

// Récupérer tous les événements qui se déroulent dans 5 jours
$query = $bdd->prepare("SELECT * FROM evenements WHERE DATE(date) = DATE_ADD(CURDATE(), INTERVAL 5 DAY)");
$query->execute();
$events = $query->fetchAll();

foreach ($events as $event) {
    // Vérifier s'il y a des inscrits à cet événement
    $inscriptionQuery = $bdd->prepare("SELECT COUNT(*) FROM inscriptions_evenements WHERE id_evenement = ? AND actif = b'1'");
    $inscriptionQuery->execute([$event['id']]);
    $inscriptionCount = $inscriptionQuery->fetchColumn();

    if ($inscriptionCount == 0) {
        // Aucun inscrit, envoyer un email au créateur de l'événement

        // Récupérer les informations de l'utilisateur (créateur de l'événement)
        $userQuery = $bdd->prepare("SELECT email, prenom FROM users WHERE id = ?");
        $userQuery->execute([$event['id_user']]);
        $user = $userQuery->fetch();

        // Configuration de PHPMailer pour envoyer l'email
        $mail = new PHPMailer(true);
        try {
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'majtx69@gmail.com';  
            $mail->Password = 'dzej lfqh ppff pjtn';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('majtx69@gmail.com', 'BDE');
            $mail->addAddress($user['email'], $user['prenom']);

            $mail->isHTML(true);
            $mail->Subject = "Aucun inscrit à votre événement \"" . $event['libelle_evenement'] . "\"";
            $mail->Body = "Bonjour " . $user['prenom'] . ",<br><br>Nous vous informons qu'il n'y a actuellement aucun inscrit à votre événement \"" . $event['libelle_evenement'] . "\" prévu pour le " . $event['date'] . ".<br><br>Cordialement,<br>L'équipe de gestion des événements";

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>
