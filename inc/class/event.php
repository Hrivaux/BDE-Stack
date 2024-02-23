<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../../vendor/autoload.php';
require_once '../../global.php'; // Ce fichier initialise la session et récupère $id_encours
require_once 'event.php';
require_once '../InscriptionManager.php';
require_once 'user.php';
require_once '../mail/mailer.php';

class Event {
    private $bdd;

    public function __construct($bdd) {
        $this->bdd = $bdd;
    }

    public function getEventDetails($id_evenement) {
        $stmt = $this->bdd->prepare("SELECT libelle_evenement, date, adresse, ville FROM evenements WHERE id = ?");
        $stmt->execute([$id_evenement]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUpcomingEventsWithLowRegistrations($daysAhead = 5, $minRegistrations = 5) {
        $stmt = $this->bdd->prepare("
            SELECT e.id, e.libelle_evenement, e.id_user, e.date, COUNT(i.id) AS nb_inscrits
            FROM evenements e
            LEFT JOIN inscriptions_evenements i ON e.id = i.id_evenement AND i.actif = 1
            WHERE e.date <= DATE_ADD(CURDATE(), INTERVAL :daysAhead DAY) AND e.date >= CURDATE()
            GROUP BY e.id
            HAVING nb_inscrits < :minRegistrations
        ");
        $stmt->execute(['daysAhead' => $daysAhead, 'minRegistrations' => $minRegistrations]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>