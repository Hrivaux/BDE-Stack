<?php

 require ("../../global.php");


$idM = $_POST['medecin'];
$date = $_POST['date'];
$echantillon = $_POST['echantillon'];
$id_motif = $_POST['id_motif'];
$statut = "0";

if (!empty($idM) && !empty($date) && !empty($echantillon) && !empty($id_motif)) {

    $reponse = $bdd->prepare("INSERT INTO visites(visiteur_id,medecin_id,echantillon_id,date_visite,statut_visite,motif_id) VALUES (?,?,?,?,?,?)");

    $reponse->execute(array($id_encours, $idM, $echantillon, $date, $statut, $id_motif));

    //Logs
    $req_logs = ("INSERT INTO logs(user_id,type_log,action, date) VALUES ($id_encours, 'Insertion', 'A planifié une visite (pour le $date)', '$today')");
    $bdd->exec($req_logs);
    header ('Location: ../../prendre_rdv.php?action=ok');
} 
else 
{
    Header('location: ../../prendre_rdv.php?action=erreur');
}