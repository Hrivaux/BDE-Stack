<?php

// Assurez-vous que ces chemins sont corrects
require_once 'ImageUploader.php'; 

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $libellePublication = isset($_POST['libelle_publication']) ? $_POST['libelle_publication'] : '';

    require_once 'DatabaseConnection.php';

    // Établir une connexion à la base de données
    $database = new DatabaseConnection('mysql-hubin.alwaysdata.net', 'hubin_bde', 'hubin', 'HubinSQL2022!');
    $db = $database->connect();

    // Traiter le téléchargement de l'image
    $imageUploader = new ImageUploader();

    // Vérifier si un fichier a été téléchargé
    if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == 0) {
        // Tentative de téléchargement de l'image
        $uploadSuccess = $imageUploader->upload($_FILES['fileToUpload']);

        require_once '../global.php';  


        // Récupérez l'ID de l'utilisateur à partir de la session
        if (isset($_SESSION['user'])) {
            $userId = $_SESSION['user'];

            // Enregistrer les informations dans la base de données si le téléchargement est réussi
            if ($uploadSuccess) {
                if ($uploadSuccess) {
                // Récupérer le chemin complet du fichier
                $imagePath = $imageUploader->getUploadedFilePath();  

                // Extraire le nom du fichier à partir du chemin complet
                $fileName = basename($imagePath);

                // Requête d'insertion avec seulement le nom du fichier
                $sql = "INSERT INTO publication (libelle_publication, description, chemin_image, id_users) VALUES (:libelle_publication, :description, :chemin_image, $id_encours)";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':libelle_publication', $libellePublication);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':chemin_image', $fileName);
                $stmt->execute();

                header('Location: ../publications.php');
                exit; 

            } else {
                echo "Erreur lors du téléchargement de l'image : " . $imageUploader->getErrorMsg();
            }
        }
        } else {
            // Gérer l'erreur si l'utilisateur n'est pas connecté
            echo "Erreur : Vous devez être connecté pour effectuer cette action.";
        }
    } else {
        echo "Aucun fichier téléchargé ou erreur lors du téléchargement.";
    }

    // Déconnexion de la base de données
    $database->disconnect();
}