<?php

require_once('../DataBaseConnection.php');

class InscriptionManager {
    private $bdd;

    public function __construct($bdd) {
        $this->bdd = $bdd;
    }

    public function inscription($nom, $prenom, $email, $password, $password2, $pseudo) {
        if ($password !== $password2) {
            Header('location: ../../register.php?inscription=password');
            return;
        }

        $pass_hash = password_hash($password, PASSWORD_DEFAULT);

        $date_inscription = date('Y-m-d H:i:s');
        $id_grade = 1;

        $reponse = $this->bdd->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $reponse->execute([$email]);
        $count = $reponse->fetchColumn();

        if ($count > 0) {
            Header('location: ../../register.php?inscription=email');
            return;
        }

        if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($password) && !empty($pseudo)) {
            $reponse = $this->bdd->prepare("INSERT INTO users(nom, prenom, email, password, pseudo, date_inscription, id_grade) VALUES (?, ?, ?, ?, ?, ?, ?)");

            $reponse->execute([$nom, $prenom, $email, $pass_hash, $pseudo, $date_inscription, $id_grade]);

            Header('location: ../../accueil.php?action=success');
        } else {
            Header('location: ../../register.php?inscription=erreur');
        }
    }
}

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$pseudo = $_POST['pseudo'];

$database = new DatabaseConnection('mysql-hubin.alwaysdata.net', 'hubin_bde', 'hubin', 'HubinSQL2022!');
$bdd = $database->connect();

$inscriptionManager = new InscriptionManager($bdd);
$inscriptionManager->inscription($nom, $prenom, $email, $password, $password2, $pseudo);
