<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('../inc/DataBaseConnection.php');
require '../vendor/autoload.php'; 


// Récupérer tous les événements à J-5
$requete = $bdd->prepare("SELECT e.id, e.libelle_evenement, e.id_user, e.date, COUNT(i.id) as nb_inscrits
FROM evenements e
LEFT JOIN inscriptions_evenements i ON e.id = i.id_evenement AND i.actif = b'1'
WHERE e.date <= DATE_ADD(CURDATE(), INTERVAL 5 DAY) AND e.date >= CURDATE()
GROUP BY e.id
HAVING nb_inscrits = 0;
");
$requete->execute();
$evenements = $requete->fetchAll();

foreach ($evenements as $evenement) {
    // Si moins de 5 inscrits, envoyer un mail au créateur de l'événement
    if ($evenement['nb_inscrits'] < 5) {
        // Récupérer l'email du créateur de l'événement
        $requeteUser = $bdd->prepare("SELECT email FROM users WHERE id = ?");
        $requeteUser->execute([$evenement['id_user']]);
        $createur = $requeteUser->fetch();

        // Envoyer l'email
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

            $mail->setFrom('majtx69@gmail.com', 'BDE'); // Remplacer par votre e-mail et nom
            $mail->addAddress($createur['email']); // Ajouter l'email du créateur de l'événement

            $mail->isHTML(true);
            $mail->Subject = 'Peu d\'inscriptions pour votre événement ' . $evenement['libelle_evenement'];
            $mail->Body = 'Bonjour, <br><br> Nous avons remarqué que votre événement "' . $evenement['libelle_evenement'] . '" prévu le ' . $evenement['date'] . ' a moins de 5 inscriptions. Vous voudrez peut-être prendre des mesures pour promouvoir davantage votre événement. <br><br> Cordialement, <br> Votre équipe';

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>
