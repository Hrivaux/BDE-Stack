<?php
class UserPublicationPage {
    // Propriétés
    private $bdd;
    private $id_encours;
    private $prenomnom;
    private $profilconnecte;
    private $nb_publicationducompte;

    // Constructeur
    public function __construct() {
        // Initialisation des propriétés
        $this->bdd = new PDO("mysql:host=localhost;dbname=votre_base_de_donnees", "votre_nom_utilisateur", "votre_mot_de_passe");
        $this->id_encours = $_SESSION['id'];
        $this->loadUserData();
        $this->loadPublicationCount();
    }

    // Méthode pour charger les données de l'utilisateur
    private function loadUserData() {
        $requete = $this->bdd->prepare("SELECT * FROM users WHERE id = ?");
        $requete->execute([$this->id_encours]);
        $this->profilconnecte = $requete->fetch();
        $this->prenomnom = $this->profilconnecte['prenom'] . ' ' . $this->profilconnecte['nom'];
    }

    // Méthode pour charger le nombre de publications de l'utilisateur
    private function loadPublicationCount() {
        $nbpubli = $this->bdd->query("SELECT count(*) as nb FROM publication WHERE id_users = $this->id_encours");
        $data = $nbpubli->fetch();
        $this->nb_publicationducompte = $data['nb'];
    }

    // Méthode pour afficher la page
    public function displayPage() {
        include('templates/meta.php');
        include('templates/header.php');
        include('templates/menu.php');
        echo $this->generatePageContent();
    }

    // Méthode pour générer le contenu de la page
    private function generatePageContent() {
        ob_start(); // Début de la temporisation de sortie
?>
        <!-- Votre code HTML ici -->

        <!-- Utilisez $this->prenomnom, $this->nb_publicationducompte, etc. pour afficher les données -->

<?php
        return ob_get_clean(); // Fin de la temporisation de sortie et retourne le contenu
    }
}
?>
