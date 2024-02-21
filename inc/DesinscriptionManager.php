<?php

require_once('DataBaseConnection.php');

class DesinscriptionManager {
    private $bdd;

    public function __construct($bdd) {
        $this->bdd = $bdd;
    }

    public function desinscriptionEvenement($id_evenement, $id_encours) {
        $requete_update = "UPDATE inscriptions_evenements SET actif = 0 WHERE id_evenement = ? AND id_user = $id_encours";
        $req_update = $this->bdd->prepare($requete_update);
        $req_update->execute([$id_evenement, $id_encours]);
    }
}
