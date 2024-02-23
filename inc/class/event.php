<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../../vendor/autoload.php';
require_once '../../global.php';
require_once '../InscriptionManager.php';
require_once 'user.php';
require_once '../mail/mailer.php';

class Event {
    private $bdd;

    public function __construct(PDO $bdd) {
        $this->bdd = $bdd;
    }

    public function getEventDetails($id_evenement) {
        try {
            $stmt = $this->bdd->prepare("SELECT libelle_evenement, date, adresse, ville FROM evenements WHERE id = ?");
            $stmt->bindValue(1, $id_evenement, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getUnregisteredUpcomingEvents() {
        $sql = "SELECT e.id, e.libelle_evenement, e.id_user, e.date, COUNT(i.id) as nb_inscrits
                FROM evenements e
                LEFT JOIN inscriptions_evenements i ON e.id = i.id_evenement AND i.actif = b'1'
                WHERE e.date <= DATE_ADD(CURDATE(), INTERVAL 5 DAY) AND e.date >= CURDATE()
                GROUP BY e.id
                HAVING nb_inscrits = 0";
        try {
            $stmt = $this->bdd->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
           
            return false;
        }
    }

    public function getEventsTomorrow() {
        $sql = "SELECT id, libelle_evenement, date, adresse, ville FROM evenements WHERE DATE(date) = DATE_ADD(CURDATE(), INTERVAL 1 DAY)";
        $stmt = $this->bdd->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}

?>
