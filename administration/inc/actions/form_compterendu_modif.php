<?php

require_once ('../../global.php');

$idCR = htmlentities(trim($_GET['id']));
$idCR = (int)$idCR;

$id_medecin = $_POST["id_medecin"];
$id_echantillon = $_POST["id_echantillon"];
$date = $_POST["date"];
$compterendu = $_POST["compterendu"];
$avis = $_POST['avis'];
$etat = $_POST['etat'];
$nouvelle_visite = $_POST['nouvelle_visite'];
$id_motif = $_POST["id_motif"];

$req = "UPDATE comptesrendus SET ";

if (!empty($id_medecin))
{
    $req = $req . "id_medecin='$id_medecin',";
}

if (!empty($id_echantillon))
{
    $req = $req . "id_echantillon='$id_echantillon',";
}

if (!empty($date))
{
    $req = $req . "date='$date',";
}

if (!empty($compterendu))
{
    $req = $req . "compterendu='$compterendu',";
}

if (!empty($avis))
{
    $req = $req . "avis='$avis',";
}

if (!empty($etat))
{
    $req = $req . "etat='$etat',";
}

if (!empty($nouvelle_visite))
{
    $req = $req . "nouvelle_visite='$nouvelle_visite',";
}

if (!empty($id_motif))
{
    $req = $req . "id_motif='$id_motif',";
}

$req = substr($req, 0, -1) . " WHERE id = $idCR";

if ($bdd->exec($req))
{    //Logs
    $req_logs = ("INSERT INTO logs(user_id,type_log,action, date) VALUES ($id_encours, 'Modification', 'A modifié le compte rendu ($idCR)', '$today')");
    $bdd->exec($req_logs);
    Header('location: ../../liste_cr.php?actioncrmodif=successcrmodif');
}
else
{
   Header('location: ../../liste_cr.php?action=erreur');
}
?>



?>
