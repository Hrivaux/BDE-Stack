<?php
require_once('../DataBaseConnection.php');

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $database = new DatabaseConnection('mysql-hubin.alwaysdata.net', 'hubin_bde', 'hubin', 'HubinSQL2022!');
    $bdd = $database->connect();

    // Vérifier si le jeton est valide
    $reponse = $bdd->prepare("SELECT email FROM users WHERE token = ?");
    $reponse->execute([$token]);
    $user = $reponse->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Changer le statut de l'utilisateur dans la base de données
        $reponse = $bdd->prepare("UPDATE users SET validate = 1 WHERE token = ?");
        $reponse->execute([$token]);

        // Supprimer le jeton de la base de données une fois qu'il a été utilisé
        $reponse = $bdd->prepare("UPDATE users SET token = NULL WHERE token = ?");
        $reponse->execute([$token]);

        // Rediriger l'utilisateur vers une page de confirmation
        header('Location: confirmation.php');
        exit();
    } else {
        // Jeton invalide, rediriger vers une page d'erreur
        header('Location: erreur.php');
        exit();
    }
} else {
    // Le paramètre du jeton est manquant, rediriger vers une page d'erreur
    header('Location: erreur.php');
    exit();
}
?>
