<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../../global.php';
require_once '../../vendor/autoload.php';
require_once '../class/event.php';
require_once '../mail/mailer.php';

$eventManager = new Event($bdd);
$mailer = new Mailer(new PHPMailer(true));

$events = $eventManager->getUpcomingEventsWithLowRegistrations();

foreach ($events as $event) {
    $dateEvenement = (new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE, 'Europe/Paris', IntlDateFormatter::GREGORIAN))->format(new DateTime($event['date']));
    
    // Récupérer l'email du créateur de l'événement
    $requeteUser = $bdd->prepare("SELECT email FROM users WHERE id = ?");
    $requeteUser->execute([$event['id_user']]);
    $createur = $requeteUser->fetch();

    if ($createur) {
        $mailer->sendLowRegistrationNotification($createur['email'], $event['libelle_evenement'], $dateEvenement);
    }
}

?>