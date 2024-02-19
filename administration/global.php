<?php
@session_start();

@include ('./inc/sql.php');
@include ('../inc/sql.php');
@include ('./inc/functions.php');
@include ('../inc/functions.php');
@include ('../../inc/sql.php');
@include ('../../inc/functions.php');

if (isset($_SESSION['user']))
{
    $email = $_SESSION['user'];
    $sql = $bdd->query("SELECT * FROM utilisateurs WHERE email= '$email' LIMIT 1");
    $user = $sql->fetch(PDO::FETCH_ASSOC);

    $prenomnom = $user['prenom'] . " " . $user['nom'];
    $nomprenom = $user['nom'] . " " . $user['prenom'];
    $id_encours = $user['id'];
    $grade_encours = $user['grade'];
    $region_encours = $user['region'];
}

// Date du jour en PHP
$month = date('m');
$day = date('d');
$year = date('Y');
$today = $year . '-' . $month . '-' . $day;

setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro');


// Paramètres du site
$req = $bdd->query("SELECT * FROM site_settings WHERE id = 1");
$config = $req->fetch(PDO::FETCH_ASSOC);
$url = $config['url'];
$nomsite = $config['site_name'];
$version = $config['version'];
$logo = $config['logo'];

?>
