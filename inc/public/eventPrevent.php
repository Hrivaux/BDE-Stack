<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php'; 
require_once('../../global.php');

require_once '../class/User.php';
require_once '../mail/Mailer.php';
require_once '../class/Event.php';


$eventManager = new Event($bdd);
$userManager = new User($bdd);

$mailer = new PHPMailer(true);
$mail = new Mailer($mailer);

$events = $eventManager->getEventsTomorrow();

foreach ($events as $event) {
    $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
    $dateEvenement = $formatter->format(new DateTime($event['date']));

    $inscrits = $userManager->getUsersRegisteredForEvent($event['id']);

    foreach ($inscrits as $inscrit) {
        $mail->sendEventReminder($inscrit['email'], $inscrit['prenom'], $event['libelle_evenement'], $dateEvenement, $event['adresse'], $event['ville']);
    }
}

?>