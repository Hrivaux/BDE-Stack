<?php require '../global.php'?>


<?php
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
    header("Location: ../se-connecter.php");
    
    exit();
}
var_dump($_POST);

// Vérifier les données FILES
var_dump($_FILES);