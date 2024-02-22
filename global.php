<?php
@session_start();

@include ('./inc/DataBaseConnection.php.php');
@include ('../inc/DataBaseConnection.php.php');
@include ('./inc/functions.php');
@include ('../inc/functions.php');
@include ('../../inc/DataBaseConnection.php.php');
@include ('../../inc/functions.php');
require_once 'inc/DatabaseConnection.php';

if (isset($_SESSION['user'])) {
    $email = $_SESSION['user'];
    
    // Connexion à la base de données
    $database = new DatabaseConnection('mysql-hubin.alwaysdata.net', 'hubin_bde', 'hubin', 'HubinSQL2022!');
    $bdd = $database->connect();

    $sql = $bdd->prepare("SELECT * FROM users WHERE email= :email LIMIT 1");
    $sql->execute(array(':email' => $email));
    $user = $sql->fetch(PDO::FETCH_ASSOC);

    $prenomnom = $user['prenom'] . " " . $user['nom'];
    $nomprenom = $user['nom'] . " " . $user['prenom'];
    $id_encours = $user['id'];
    $photo_profil = $user['photo_profil'];
    $grade_encours = $user['id_grade'];

   // $region_encours = $user['region'];
}

// Date du jour en PHP
$today = date('d-m-y');

setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro');


$req = $bdd->query("SELECT * FROM site_settings WHERE id = 1");
$config = $req->fetch(PDO::FETCH_ASSOC);
$url = $config['url'];
$nomSite = $config['nom_site'];
