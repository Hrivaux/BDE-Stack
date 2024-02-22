<?php

class Event {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getEventDetails($id_evenement) {
        $stmt = $this->db->prepare("SELECT libelle_evenement, date, adresse, ville FROM evenements WHERE id = ?");
        $stmt->execute([$id_evenement]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}


?>