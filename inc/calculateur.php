<?php 
include("../global.php");

// Nombre d'utilisateurs totaux
$nbusers = $bdd->query("SELECT count(*) as nb FROM users");
$data = $nbusers->fetch();
$nbutilisateurs = $data['nb'];

// Nombre de personnes qui ont mon grade
$nbgrade = $bdd->query("SELECT count(*) as nb, G.libelle as 'nom_grade'
FROM users   U
LEFT JOIN grade     G ON U.grade = G.id_grade
WHERE U.grade = $grade_encours");
$data = $nbgrade->fetch();
$nbutilisateursgrade = $data['nb'];
$nomgrade = $data['nom_grade'];
if ($nbutilisateursgrade > 1) { $nomgrade = $nomgrade."s"; }
