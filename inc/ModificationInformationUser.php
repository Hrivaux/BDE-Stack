<?php
require '../global.php'; // Assurez-vous que ce chemin est correct

// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($id_encours)) {
    

    $sql = "UPDATE users SET ";
    $params = [];

    // Vérifiez si le champ 'status' a été soumis et ajoutez-le à la requête SQL
    if (!empty($_POST['status'])) {
        $sql .= "status = :status, ";
        $params[':status'] = $_POST['status'];
    }

    // Vérifiez si le champ 'ecole' a été soumis et ajoutez-le à la requête SQL
    if (!empty($_POST['ecole'])) {
        $sql .= "ecole = :ecole, ";
        $params[':ecole'] = $_POST['ecole'];
    }

    // Vérifiez si le champ 'ville' a été soumis et ajoutez-le à la requête SQL
    if (!empty($_POST['ville'])) {
        $sql .= "ville = :ville, ";
        $params[':ville'] = $_POST['ville'];
    }

    // Supprimez la dernière virgule de la requête SQL
    $sql = rtrim($sql, ', ');

    // Ajoutez la condition WHERE pour cibler l'utilisateur par son ID
    $sql .= " WHERE id = :id";
    $params[':id'] = $id_encours;

    // Préparez et exécutez la requête SQL
    try {
        $stmt = $bdd->prepare($sql);
        $stmt->execute($params);

        // Redirection ou message de succès
        echo "Informations mises à jour avec succès.";
       
         header('Location: ../author-page.php');
    } catch (PDOException $e) {
        // Gestion des erreurs
        die("Erreur lors de la mise à jour : " . $e->getMessage());
    }
} else {
    echo "Méthode de requête non autorisée ou utilisateur non connecté.";
}
?>
