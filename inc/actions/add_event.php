<?php
require_once('../../global.php');
require_once '../DataBaseConnection.php';


// Utilisation :
$database = new DatabaseConnection('mysql-hubin.alwaysdata.net', 'hubin_bde', 'hubin', 'HubinSQL2022!');
$bdd = $database->connect();

class Event
{
    private $bdd;
    
    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function addEvent($id_encours, $titre, $nbmax, $categorie, $date, $image, $adresse, $ville, $description, $prix)
    {
        $query = "INSERT INTO evenements (id_user, libelle_evenement, participants_max, id_categorie, date, photo_couverture, adresse, ville, description, prix) VALUES (:id_user, :libelle_evenement, :participants_max, :id_categorie, :date, :photo_couverture, :adresse, :ville, :description, :prix)";

        $stmt = $this->bdd->prepare($query);
        $stmt->bindParam(':id_user', $id_encours);
        $stmt->bindParam(':libelle_evenement', $titre);
        $stmt->bindParam(':participants_max', $nbmax);
        $stmt->bindParam(':id_categorie', $categorie);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':photo_couverture', $image);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':prix', $prix);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

// Instanciation de la classe Event
$event = new Event($bdd);

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification si un fichier a été sélectionné
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $nomFichier = $_FILES["image"]["name"];
        $nomTemporaire = $_FILES["image"]["tmp_name"];
        $typeFichier = $_FILES["image"]["type"];
        $description = $_POST['contenu'];
        $titre = $_POST['titre'];
        $categorie = $_POST['categorie'];
        $ville = $_POST['ville'];
        $adresse = $_POST['adresse'];
        $date = $_POST['date'];
        $prix = $_POST['prix'];
        $nbmax = $_POST['nbmax'];
        $id_encours = $_POST['id_encours'];


        $formatsAcceptes = array("image/jpeg", "image/png", "image/gif");
        if (in_array($typeFichier, $formatsAcceptes)) {
            $dossierDestination = "../../images/uploads/evenements/couverture/";
            $cheminDestination = $dossierDestination . $nomFichier;
            if (file_exists($cheminDestination)) {
                header('Location: ../../index.php?addE=existe');
                exit();
            }
            if (move_uploaded_file($nomTemporaire, $cheminDestination)) {
                if ($event->addEvent($id_encours, $titre, $nbmax, $categorie, $date, $nomFichier, $adresse, $ville, $description, $prix)) {
                    header('Location: ../../index.php?addE=evenementOK');
                    exit();
                } else {
                    header('Location: ../../index.php?addE=evenementNonOK1');
                    exit();
                }
            } else {
                header('Location: ../../index.php?addE=evenementNonOK2');
                exit();
            }
        } else {
            header('Location: ../../index.php?addE=format');
            exit();
        }
    } else {
        header('Location: ../../index.php?addE=champs');
        exit();
    }
}
