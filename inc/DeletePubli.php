<?php
require_once 'DataBaseConnection.php';

class DeletePubli {
    private $bdd;

    public function __construct($bdd) {
        $this->bdd = $bdd;
    }

    public function supprimerPublication($id_publication) {
        try {
            // Préparer la requête SQL de suppression de la publication
            $stmt = $this->bdd->prepare("DELETE FROM publication WHERE id = :id_publication");
            // Liaison des paramètres
            $stmt->bindParam(':id_publication', $id_publication);
            // Exécuter la requête
            if ($stmt->execute()) {
                return true; // Suppression réussie
            } else {
                return false; // Échec de la suppression
            }
        } catch(PDOException $e) {
            echo "Erreur lors de la suppression de la publication : " . $e->getMessage();
            return false; // Échec de la suppression en cas d'erreur
        }
    }
}

// Vérifier si l'ID de la publication à supprimer est passé en paramètre GET
if (isset($_GET['id_publication'])) {
    // Récupérer l'ID de la publication à supprimer
    $id_publication = $_GET['id_publication'];

    // Créer une instance de la classe DeletePubli
    $deletePubli = new DeletePubli($bdd);

    // Appeler la méthode supprimerPublication pour supprimer la publication
    if ($deletePubli->supprimerPublication($id_publication)) {
        if ($deletePubli->supprimerPublication($id_publication)) {
    echo "La publication a été supprimée avec succès.";
    header("refresh:2;url=../publications.php");
}

    } else {
        echo "Erreur lors de la suppression de la publication.";
        header("refresh:2;url=../publications.php");
    }
} else {
    echo "L'ID de la publication à supprimer n'a pas été spécifié.";
}
