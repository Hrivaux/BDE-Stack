<?php

require_once 'DataBaseConnection.php';

class ModificationInformationManager {
    private $bdd;

    public function __construct($bdd) {
        $this->bdd = $bdd;
    }

    public function modifierInformations($id_utilisateur, $nouveau_titre, $nouveau_contenu, $nouvelle_ville, $nouvelle_image_profil, $nouvelle_image_couverture) {
        // Vérifier si une nouvelle image de profil a été téléchargée
        if (!empty($nouvelle_image_profil['name']) && $nouvelle_image_profil['error'] == UPLOAD_ERR_OK) {
            $chemin_destination_profil = "../images/uploads/photo_profil/";
            $nom_fichier_profil = basename($nouvelle_image_profil["name"]);
            $chemin_fichier_profil = $chemin_destination_profil . $nom_fichier_profil;
            if (move_uploaded_file($nouvelle_image_profil["tmp_name"], $chemin_fichier_profil)) {
                $url_image_profil = $chemin_fichier_profil;
                $requete_update_image_profil = "UPDATE users SET photo_profil = ? WHERE id = ?";
                $req_update_image_profil = $this->bdd->prepare($requete_update_image_profil);
                $req_update_image_profil->execute([$url_image_profil, $id_utilisateur]);
            } else {
                echo "Erreur lors du téléchargement de l'image de profil.";
            }
        }

        // Vérifier si une nouvelle image de couverture a été téléchargée
        if (!empty($nouvelle_image_couverture['name']) && $nouvelle_image_couverture['error'] == UPLOAD_ERR_OK) {
            $chemin_destination_couverture = "../images/uploads/photo_couverture/";
            $nom_fichier_couverture = basename($nouvelle_image_couverture["name"]);
            $chemin_fichier_couverture = $chemin_destination_couverture . $nom_fichier_couverture;
            if (move_uploaded_file($nouvelle_image_couverture["tmp_name"], $chemin_fichier_couverture)) {
                $url_image_couverture = $chemin_fichier_couverture;
                $requete_update_image_couverture = "UPDATE users SET photo_couverture = ? WHERE id = ?";
                $req_update_image_couverture = $this->bdd->prepare($requete_update_image_couverture);
                $req_update_image_couverture->execute([$url_image_couverture, $id_utilisateur]);
            } else {
                echo "Erreur lors du téléchargement de l'image de couverture.";
            }
        }

        // Mettre à jour les autres informations dans la base de données
        $requete_update = "UPDATE users SET status = ?, ecole = ?, ville = ? WHERE id = ?";
        $req_update = $this->bdd->prepare($requete_update);
        $req_update->execute([$nouveau_titre, $nouveau_contenu, $nouvelle_ville, $id_utilisateur]);
    }
}

// Instanciation de la classe ModificationInformationManager
$modificationManager = new ModificationInformationManager($bdd);

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $id_utilisateur = $_POST['id_utilisateur']; // Assurez-vous que ce champ est envoyé depuis le formulaire
    $nouveau_titre = $_POST['status'];
    $nouveau_contenu = $_POST['ecole'];
    $nouvelle_ville = $_POST['ville'];
    $nouvelle_image_profil = $_FILES['photo_profil'];
    $nouvelle_image_couverture = $_FILES['photo_couverture'];

    // Appeler la méthode pour modifier les informations
    $modificationManager->modifierInformations($id_utilisateur, $nouveau_titre, $nouveau_contenu, $nouvelle_ville, $nouvelle_image_profil, $nouvelle_image_couverture);

    // Rediriger l'utilisateur vers une page de confirmation ou autre
    header("Location: ../accueil.php");
    
    exit();
}
var_dump($_POST);

// Vérifier les données FILES
var_dump($_FILES);