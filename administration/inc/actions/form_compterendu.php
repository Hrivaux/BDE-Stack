<?php 

require_once('../../global.php');


$id_medecin = $_POST["id_medecin"];
$id_echantillon = $_POST["id_echantillon"];
$date = $_POST["date"];
$compterendu = $_POST["compterendu"];
$avis = $_POST['avis'];
$etat = $_POST['etat'];
$nouvelle_visite = $_POST["nouvelle_visite"];
$id_motif = $_POST["id_motif"];
$id_motif2 = $_POST["id_motif2"];




if (!empty($id_medecin) || !empty($id_echantillon) || !empty($date) || !empty($compterendu) || !empty($avis) || !empty($etat) || !empty($nouvelle_visite) || !empty($id_motif) || !empty($id_motif2)) {
      
   $reponse = $bdd->prepare("INSERT INTO comptesrendus(id_visiteur, id_medecin, date, id_echantillon, compterendu, avis, etat, nouvelle_visite, id_motif, id_motif2) VALUES (?,?,?,?,?,?,?,?,?,?)");

   $reponse->execute(array($id_encours, $id_medecin, $date, $id_echantillon, $compterendu, $avis, $etat, $nouvelle_visite, $id_motif, $id_motif2));
   Header('location: ../../liste_cr.php?actioncr=successcr');

   //Logs
   $req_logs = ("INSERT INTO logs(user_id,type_log,action, date) VALUES ($id_encours, 'Insertion', 'A rédigé un compte rendu.', '$date')");
   $bdd->exec($req_logs);

   $supp_visite = ("DELETE FROM visites WHERE medecin_id = $id_medecin");
   $bdd->exec($supp_visite);
} 
else
{
   Header('location: ../../redact_cr.php?action=erreur');
}
?>