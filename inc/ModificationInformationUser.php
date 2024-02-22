<?php require '../global.php'?>


<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si tous les champs requis sont présents
    if (isset($_POST["id"]) && isset($_POST["status"]) && isset($_POST["ecole"]) && isset($_POST["ville"]) && isset($_FILES["photo_profil"]) && isset($_FILES["photo_couverture"])) {
        
        // Récupérer les données du formulaire
        $id_utilisateur = $_POST["id"];
        $status = $_POST["status"];
        $ecole = $_POST["ecole"];
        $ville = $_POST["ville"];
        $photo_profil = $_FILES["photo_profil"]["name"];
        $photo_couverture = $_FILES["photo_couverture"]["name"];


        // Préparer la requête SQL pour mettre à jour les informations de l'utilisateur
        $sql = "UPDATE users SET status='$status', ecole='$ecole', ville='$ville', photo_profil='$photo_profil', photo_couverture='$photo_couverture' WHERE id_utilisateur=$id_utilisateur";

        // Exécuter la requête SQL
        if ($bdd->query($sql) === TRUE) {
            echo "Informations mises à jour avec succès";
        } else {
            echo "Erreur lors de la mise à jour des informations: ";
        }

       ;
    } else {
        echo "Tous les champs du formulaire sont requis";
    }
} else {
    echo "Le formulaire n'a pas été soumis";
}
?>
