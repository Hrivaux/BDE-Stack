<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('../../global.php');
require_once('../InscriptionManager.php');
require '../../vendor/autoload.php';

// Assurez-vous que la locale est bien réglée sur le français
setlocale(LC_TIME, 'fr_FR.UTF-8');

if (isset($_GET['id_evenement'])) {
    $id_evenement = $_GET['id_evenement'];

    if ($id_encours) {
       
        $inscriptionManager = new InscriptionManager($bdd);
        $resultat_verif = $inscriptionManager->verificationInscription($id_evenement, $id_encours);

        if ($resultat_verif) {
            if ($resultat_verif['actif'] == 0) {
                $inscriptionManager->miseAJourInscription($id_evenement, $id_encours);
            } else {
                header('Location: ../../evenements.php?inscription=erreur');
                exit();
            }
        } else {
            $inscriptionManager->inscriptionEvenement($id_evenement, $id_encours);
        }

        // Récupérer les détails de l'événement et de l'utilisateur pour l'email
        $eventQuery = $bdd->prepare("SELECT libelle_evenement, date, adresse, ville FROM evenements WHERE id = ?");
        $eventQuery->execute([$id_evenement]);
        $eventDetails = $eventQuery->fetch();

        $userQuery = $bdd->prepare("SELECT email, prenom FROM users WHERE id = ?");
        $userQuery->execute([$id_encours]);
        $userDetails = $userQuery->fetch();

        // Formatage de la date en français
        $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
        $dateEvenement = $formatter->format(new DateTime($eventDetails['date']));

        // Envoyer l'email de confirmation
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
            $mail->addAddress($userDetails['email'], $userDetails['prenom']);

            $mail->isHTML(true);
            $mail->Subject = 'Confirmation d\'inscription à l\'événement';
            $mail->Body = 'Bonjour ' . $userDetails['prenom'] . ',<br><br>Vous êtes bien inscrit(e) à l\'événement <strong>' . $eventDetails['libelle_evenement'] . '</strong> qui se tiendra le ' . $dateEvenement . ' à ' . $eventDetails['adresse'] . ', ' . $eventDetails['ville'] . '.<br><br>Merci et à bientôt !';

            $mail->send();
            header('Location: ../../evenements.php?inscription=inscrit');
            exit();
        } catch (Exception $e) {
            header('Location: ../../evenements.php?inscription=mailerror');
            exit();
        }

    } else {
        echo "Identifiant de l'utilisateur en session invalide.";
    }
} else {
    echo "Identifiant de l'événement invalide.";
}
?>
