<?php

require_once('../../global.php');
require_once('../InscriptionManager.php');

if (isset($_GET['id_evenement'])) {
    $id_evenement = $_GET['id_evenement'];

    if ($id_encours) {

        $database = new DatabaseConnection('mysql-hubin.alwaysdata.net', 'hubin_bde', 'hubin', 'HubinSQL2022!');
        $bdd = $database->connect();

        $inscriptionManager = new InscriptionManager($bdd);
        $resultat_verif = $inscriptionManager->verificationInscription($id_evenement, $id_encours);

        if ($resultat_verif) {
            if ($resultat_verif['actif'] == 0) {
                $inscriptionManager->miseAJourInscription($id_evenement, $id_encours); 
                header('Location: ../../evenements.php?inscription=inscrit');
                exit();
            } else {
                header('Location: ../../evenements.php?inscription=erreur');
                exit();
                
            }
        } else {
            $inscriptionManager->inscriptionEvenement($id_evenement, $id_encours);
            header('Location: ../../evenements.php?inscription=inscrit');
            exit();
        }
    } else {
        echo "Identifiant de l'utilisateur en session invalide.";
    }
} else {
    echo "Identifiant de l'événement invalide.";
}