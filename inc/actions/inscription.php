<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php'; // Assurez-vous que ce chemin correspond à l'emplacement de l'autoload de Composer

require_once('../DataBaseConnection.php');

class InscriptionNow {
    private $bdd;

    public function __construct($bdd) {
        $this->bdd = $bdd;
    }

    public function traiterInscription() {
        // Récupérer les données du formulaire
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $password2 = $_POST['password2'] ?? '';
        $pseudo = $_POST['pseudo'] ?? '';

        // Appeler la méthode d'inscription
        $this->inscription($nom, $prenom, $email, $password, $password2, $pseudo);
    }

    public function inscription($nom, $prenom, $email, $password, $password2, $pseudo) {
        // Vérifier si les deux mots de passe correspondent
        if ($password !== $password2) {
            header('Location: ../../register.php?inscription=password');
            return;
        }

        // Hasher le mot de passe
        $pass_hash = password_hash($password, PASSWORD_DEFAULT);

        // Générer le jeton unique pour la confirmation de l'email
        $token = bin2hex(random_bytes(32));

        // Vérifier si l'email est déjà utilisé
        $reponse = $this->bdd->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $reponse->execute([$email]);
        $count = $reponse->fetchColumn();

        if ($count > 0) {
            header('Location: ../../register.php?inscription=email');
            return;
        }

        // Insérer le nouvel utilisateur dans la base de données
        if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($password) && !empty($pseudo)) {
            $reponse = $this->bdd->prepare("INSERT INTO users(nom, prenom, email, password, pseudo, date_inscription, id_grade, token, validate) VALUES (?, ?, ?, ?, ?, NOW(), 1, ?, '0')");
            if($reponse->execute([$nom, $prenom, $email, $pass_hash, $pseudo, $token])) {

                // Préparation de l'email
                $mail = new PHPMailer(true);

                try {
                    // Paramètres du serveur
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'majtx69@gmail.com';
                    $mail->Password = 'dzej lfqh ppff pjtn';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    // Destinataires
                    $mail->setFrom('majtx69@gmail.com', 'BDE');
                    $mail->addAddress($email, $nom);

                    // Contenu
                    $mail->isHTML(true);
                    $mail->Subject = 'Confirmation d\'inscription';
                    $mail->Body    = "Bonjour $nom $prenom, <br><br>Merci de cliquer sur le lien suivant pour confirmer votre inscription : <a href='http://localhost:3000/inc/actions/valider.php?token=$token'>Confirmer mon inscription</a>";

                    $mail->send();
                    header('Location: ../../accueil.php?action=success');
                } catch (Exception $e) {
                    // Gérer l'erreur d'envoi d'email
                    header('Location: ../../register.php?inscription=mailerror');
                }
            } else {
                // Gérer l'erreur d'insertion dans la base de données
                header('Location: ../../register.php?inscription=dberror');
            }
        } else {
            header('Location: ../../register.php?inscription=erreur');
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inscriptionNow = new InscriptionNow($bdd);
    $inscriptionNow->traiterInscription();
}
