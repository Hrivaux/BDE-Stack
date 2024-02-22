<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('../inc/DataBaseConnection.php');
require '../vendor/autoload.php';

// Récupérer les événements qui ont lieu demain
$query = $bdd->prepare("SELECT id, libelle_evenement, date, adresse, ville FROM evenements WHERE DATE(date) = DATE_ADD(CURDATE(), INTERVAL 1 DAY)");
$query->execute();
$events = $query->fetchAll();

foreach ($events as $event) {
    // Formatage de la date en français
    $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
    $dateEvenement = $formatter->format(new DateTime($event['date']));

    // Récupérer les utilisateurs inscrits à cet événement
    $inscriptionQuery = $bdd->prepare("SELECT u.email, u.prenom FROM inscriptions_evenements ie JOIN users u ON ie.id_user = u.id WHERE ie.id_evenement = ? AND ie.actif = b'1'");
    $inscriptionQuery->execute([$event['id']]);
    $inscrits = $inscriptionQuery->fetchAll();

    foreach ($inscrits as $inscrit) {
        // Envoyer un email de rappel à chaque inscrit
        $mail = new PHPMailer(true);
        try {
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'majtx69@gmail.com';  
            $mail->Password = 'dzej lfqh ppff pjtn';  // Mettez ici votre mot de passe
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('majtx69@gmail.com', 'BDE');
            $mail->addAddress($inscrit['email'], $inscrit['prenom']);

            $mail->isHTML(true);
            $mail->Subject = 'Rappel d\'événement : ' . $event['libelle_evenement'];
            $mail->Body = 'Bonjour ' . $inscrit['prenom'] . ',<br><br>Nous vous rappelons que vous êtes inscrit(e) à l\'événement "' . $event['libelle_evenement'] . '" qui aura lieu demain, le ' . $dateEvenement . ', à ' . $event['adresse'] . ', ' . $event['ville'] . '.<br><br>Nous avons hâte de vous y voir !';

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>
