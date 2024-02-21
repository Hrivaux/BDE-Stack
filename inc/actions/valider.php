<?php
require_once('../DataBaseConnection.php'); // Ajustez le chemin selon votre structure de fichiers

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    try {
        // Rechercher l'utilisateur avec le token correspondant dans la base de données
        $query = $bdd->prepare("SELECT * FROM users WHERE token = ? AND validate = '0'");
        $query->execute([$token]);
        $user = $query->fetch();

        if ($user) {
            // Si l'utilisateur est trouvé, mettre à jour son statut 'validate' à 1 pour activer le compte
            $update = $bdd->prepare("UPDATE users SET validate = '1', token = '' WHERE token = ?");
            $update->execute([$token]);

            echo "Votre compte a été activé avec succès. Vous pouvez maintenant vous connecter.";
            // Vous pouvez rediriger l'utilisateur vers la page de connexion ou la page d'accueil ici
            // header('Location: page_de_connexion.php');
        } else {
            echo "Ce lien de confirmation est invalide ou le compte a déjà été activé.";
        }
    } catch (Exception $e) {
        echo "Une erreur est survenue : " . $e->getMessage();
    }
} else {
    echo "Aucun token de validation fourni.";
}
?>
