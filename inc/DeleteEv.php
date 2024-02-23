<?php
require_once 'DataBaseConnection.php';

class DeleteEv {
    private $bdd;

    public function __construct($bdd) {
        $this->bdd = $bdd;
    }

    public function supprimerEvenement($id_evenement) {
        try {
            // Préparer la requête SQL de suppression de la publication
            $stmt = $this->bdd->prepare("DELETE FROM evenements WHERE id = :id_evenement");
            // Liaison des paramètres
            $stmt->bindParam(':id_evenement', $id_evenement);
            // Exécuter la requête
            if ($stmt->execute()) {
                return true; // Suppression réussie
            } else {
                return false; // Échec de la suppression
            }
        } catch(PDOException $e) {
            echo "Erreur lors de la suppression de l'évènement : " . $e->getMessage();
            return false; // Échec de la suppression en cas d'erreur
        }
    }
}

// Vérifier si l'ID de la publication à supprimer est passé en paramètre GET
if (isset($_GET['id_evenement'])) {
    // Récupérer l'ID de la publication à supprimer
    $id_evenement = $_GET['id_evenement'];

    // Créer une instance de la classe DeletePubli
    $deleteEv = new DeleteEv($bdd);

    // Appeler la méthode supprimerPublication pour supprimer la publication
    if ($deleteEv->supprimerEvenement($id_evenement)) {
        if ($deleteEv->supprimerEvenement($id_evenement)) {
    echo "L'évènement a été supprimée avec succès.";
    header("refresh:2;url=../index.php");
}

    } else {
        echo "Erreur lors de la suppression de l'évènement.";
        header("refresh:2;url=../index.php");
    }
} else {
    echo "L'ID de l'évènement à supprimer n'a pas été spécifié.";
}
