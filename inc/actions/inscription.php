<?php
require_once('../sql.php');
// Récupération des champs du formulaire

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$date_naissance = $_POST['date_naissance'];
$telephone = $_POST['telephone'];
$password = $_POST['password'];
$sexe = $_POST['sexe'];
$pseudo = $_POST['pseudo'];
/*$ville = $_POST['ville'];
$adresse = $_POST['adresse'];
$codepostal = $_POST['codepostal'];*/
$pass_hash = password_hash($password, PASSWORD_DEFAULT);

if (!empty($nom) || !empty($prenom) || !empty($email) || !empty($date_naissance) || !empty($telephone) || !empty($password) || !empty($sexe) || !empty($pseudo)) {

    $reponse = $bdd->prepare("INSERT INTO users(nom, prenom, email, date_naissance, telephone, password, sexe, pseudo) VALUES (?,?,?,?,?,?,?,?)");

    $reponse->execute(array($nom, $prenom, $email, $date_naissance, $telephone, $pass_hash, $sexe, $pseudo));
    
    //Logs
    //$req_logs = ("INSERT INTO logs(user_id,type_log,action, date) VALUES ($id_encours, 'Insertion', 'A créé le compte: $nom $prenom ($email)', '$today')");
    //$bdd->exec($req_logs);
    Header('location: ../../accueil.php?action=success');
} 
else
{
    Header('location: ../../register.php?action=erreur');
}