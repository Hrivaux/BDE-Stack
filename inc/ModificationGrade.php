<?php
require_once 'DataBaseConnection.php';

class ModificationGrade {
    private $bdd;

    public function __construct($bdd) {
        $this->bdd = $bdd;
    }

    public function modifierGrade($id_utilisateur, $nouveau_grade) {
        try {
            // Préparer la requête SQL
            $stmt = $this->bdd->prepare("UPDATE users SET id_grade = :nouveau_grade WHERE id = :id_utilisateur");
            // Liaison des paramètres
            $stmt->bindParam(':id_utilisateur', $id_utilisateur);
            $stmt->bindParam(':nouveau_grade', $nouveau_grade);
            // Exécuter la requête
            if ($stmt->execute()) {
                return true; // Succès de la mise à jour
            } else {
                return false; // Échec de la mise à jour
            }
        } catch(PDOException $e) {
            echo "Erreur lors de la mise à jour du grade de l'utilisateur : " . $e->getMessage();
            return false; // Échec de la mise à jour en cas d'erreur
        }
    }
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si tous les champs requis sont présents
    if (isset($_POST["id"]) && isset($_POST["grade"])) {
        // Récupérer les données du formulaire
        $id_utilisateur = $_POST["id"];
        $nouveau_grade = $_POST["grade"];

        // Créer une instance de la classe ModificationGrade
        $modifierGrade = new ModificationGrade($bdd);

        // Appeler la méthode modifierGrade pour changer le grade de l'utilisateur
        if ($modifierGrade->modifierGrade($id_utilisateur, $nouveau_grade)) {
            header("Location: ../default-member.php");
        } else {
            echo "Erreur lors de la mise à jour du grade de l'utilisateur";
        }

        // Déconnexion de la base de données
        $database->disconnect();
    } else {
        echo "Tous les champs du formulaire sont requis";
    }
} else {
    echo "Le formulaire n'a pas été soumis";
}

// Récupérer l'ID de l'utilisateur à partir de la méthode GET
if(isset($_GET['id'])) {
    $id_utilisateur = $_GET['id'];
} else {
    // Gérer le cas où aucun ID n'est fourni dans l'URL
    $id_utilisateur = null; // ou toute autre valeur par défaut
}
?>
