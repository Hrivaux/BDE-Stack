<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../../vendor/autoload.php';
require_once '../../global.php'; // Ce fichier initialise la session et récupère $id_encours
require_once 'event.php';
require_once '../InscriptionManager.php';
require_once 'user.php';
require_once '../mail/mailer.php';

// Assurez-vous que la locale est bien réglée sur le français pour le formatage des dates
setlocale(LC_TIME, 'fr_FR.UTF-8');

if (isset($_GET['id_evenement'])) {
    $id_evenement = $_GET['id_evenement'];

    // Utilisation directe de $id_encours récupéré de la session dans global.php
    if (isset($id_encours)) {
        $event = new Event($bdd);
        $inscriptionManager = new InscriptionManager($bdd);
        $user = new User($bdd);
        $mailer = new Mailer(new PHPMailer(true));

        $eventDetails = $event->getEventDetails($id_evenement);
        $userDetails = $user->getUserDetails($id_encours);

        if ($eventDetails && $userDetails) {
            $resultat_verif = $inscriptionManager->verificationInscription($id_evenement, $id_encours);

            if ($resultat_verif && $resultat_verif['actif'] == 0) {
                $inscriptionManager->miseAJourInscription($id_evenement, $id_encours);
            } else if (!$resultat_verif) {
                $inscriptionManager->inscriptionEvenement($id_evenement, $id_encours);
            } else {
                header('Location: ../../index.php?inscription=erreur');
                exit();
            }

            // Formatage de la date de l'événement
            $dateEvenement = (new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE))->format(new DateTime($eventDetails['date']));

            // Envoi de l'email de confirmation
            try {
                $mailer->sendEventRegistrationEmail($userDetails['email'], $userDetails['prenom'], $eventDetails['libelle_evenement'], $dateEvenement, $eventDetails['adresse'], $eventDetails['ville']);
                header('Location: ../../index.php?inscription=inscrit');
            } catch (Exception $e) {
                header('Location: ../../index.php?inscription=mailerror');
            }
        } else {
            echo "Erreur : les détails de l'événement ou de l'utilisateur ne sont pas disponibles.";
        }
    } else {
        echo "Identifiant de l'utilisateur en session invalide.";
    }
} else {
    echo "Identifiant de l'événement invalide.";
}
