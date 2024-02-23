<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php'; 
require_once('../../global.php');

require_once '../class/User.php';
require_once '../mail/Mailer.php';
require_once '../class/Event.php';

// Initialisez l'objet PHPMailer
$mailer = new PHPMailer(true);

// Initialisez vos objets User et Event avec la connexion à la base de données
$userManager = new User($bdd);
$eventManager = new Event($bdd);

// Initialisez votre objet Mailer avec l'instance de PHPMailer
$mail = new Mailer($mailer);

// Récupérez les événements sans inscription
$events = $eventManager->getUnregisteredUpcomingEvents();

foreach ($events as $event) {
    // Formatez la date de l'événement
    $dateEvenement = (new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE, 'Europe/Paris', IntlDateFormatter::GREGORIAN))->format(new DateTime($event['date']));
    
    // Récupérez les détails du créateur de l'événement
    $createur = $userManager->getUserDetails($event['id_user']);

    if ($createur) {
        // Envoyez une notification pour les faibles inscriptions
        $mail->sendLowRegistrationNotification($createur['email'], $event['libelle_evenement'], $dateEvenement);
    }
}
?>
