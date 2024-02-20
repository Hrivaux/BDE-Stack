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

        // Générer le jeton unique
        $token = bin2hex(random_bytes(32));

        if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($password) && !empty($pseudo)) {
            $reponse = $this->bdd->prepare("INSERT INTO users(nom, prenom, email, password, pseudo, date_inscription, id_grade, token) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

            $reponse->execute([$nom, $prenom, $email, $pass_hash, $pseudo, $date_inscription, $id_grade, $token]);

            // Envoyer l'e-mail de confirmation à l'utilisateur
            $sujet = "Confirmation d'inscription";
            $message = "Bonjour $nom,\n\nMerci de cliquer sur le lien suivant pour confirmer votre inscription : http://hugo-rivaux.fr/BDEStack/inc/actions/valider.php?token=$token";
            $entete = "From: votreadresse@example.com\r\n";

            if (mail($email, $sujet, $message, $entete)) {
                Header('location: ../../accueil.php?action=success');
            } else {
                Header('location: ../../register.php?inscription=email');
            }
        } else {
            Header('location: ../../register.php?inscription=erreur');
        }
    }
}
