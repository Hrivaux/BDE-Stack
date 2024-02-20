<?php

require_once('DataBaseConnection.php');

class InscriptionManager {
    private $bdd;

    public function __construct($bdd) {
        $this->bdd = $bdd;
    }

    public function verificationInscription($id_evenement, $id_encours) {
        $requete_verif = "SELECT * FROM inscriptions_evenements WHERE id_evenement = ? AND id_user = ?";
        $req_verif = $this->bdd->prepare($requete_verif);
        $req_verif->execute([$id_evenement, $id_encours]);
        return $req_verif->fetch();
    }

    public function miseAJourInscription($id_evenement, $id_encours) {
        $requete_update = "UPDATE inscriptions_evenements SET actif = 1 WHERE id_evenement = ? AND id_user = ?";
        $req_update = $this->bdd->prepare($requete_update);
        $req_update->execute([$id_evenement, $id_encours]);
    }

    public function inscriptionEvenement($id_evenement, $id_encours) {
        $requete_insert = "INSERT INTO inscriptions_evenements (id_evenement, id_user, actif) VALUES (?, ?, 1)";
        $req_insert = $this->bdd->prepare($requete_insert);
        $req_insert->execute([$id_evenement, $id_encours]);
    }
}

// Votre code précédent peut maintenant utiliser cette classe pour gérer les inscriptions des utilisateurs
?>
