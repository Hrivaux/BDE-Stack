<?php
require_once('../../global.php');
require_once('../DesinscriptionManager.php');

if (isset($_GET['id_evenement'])) {
    $id_evenement = $_GET['id_evenement'];

    $database = new DatabaseConnection('mysql-hubin.alwaysdata.net', 'hubin_bde', 'hubin', 'HubinSQL2022!');
    $bdd = $database->connect();

    $inscriptionManager = new DesinscriptionManager($bdd);
    $inscriptionManager->desinscriptionEvenement($id_evenement, $id_encours); 
    header('Location: ../../index.php?desinscription=desinscritOk');
    exit();
} else {
    header('Location: ../../index.php?desinscription=desinscritNonOk');
    exit();
}
