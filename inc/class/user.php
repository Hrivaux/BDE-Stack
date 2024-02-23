<?php

require_once('../../global.php');

class User {
    private $bdd;

    public function __construct($bdd) {
        $this->bdd = $bdd;
    }

    public function register($nom, $prenom, $email, $password, $password2, $pseudo) {
        if ($password !== $password2) {
            throw new Exception("Les mots de passe ne correspondent pas.");
        }

        $passHash = password_hash($password, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(32));

        $stmt = $this->bdd->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetchColumn() > 0) {
            throw new Exception("L'email est déjà utilisé.");
        }

        $stmt = $this->bdd->prepare("INSERT INTO users (nom, prenom, email, password, pseudo, date_inscription, id_grade, token, validate) VALUES (?, ?, ?, ?, ?, NOW(), 1, ?, '0')");
        if (!$stmt->execute([$nom, $prenom, $email, $passHash, $pseudo, $token])) {
            throw new Exception("Erreur lors de l'insertion dans la base de données.");
        }

        return $token;
    }

    public function validateToken($token) {
        $stmt = $this->bdd->prepare("SELECT * FROM users WHERE token = ? AND validate = '0'");
        $stmt->execute([$token]);
        $user = $stmt->fetch();

        if ($user) {
            $update = $this->bdd->prepare("UPDATE users SET validate = '1', token = '' WHERE token = ?");
            $update->execute([$token]);

            // Retourner les informations de l'utilisateur validé pour un usage ultérieur (envoi d'e-mails, etc.)
            return $user;
        } else {
            throw new Exception("Token invalide ou compte déjà activé.");
        }
    }

    public function getUserDetails($id_user) {
        $stmt = $this->bdd->prepare("SELECT email, prenom FROM users WHERE id = ?");
        $stmt->execute([$id_user]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUsersRegisteredForEvent($eventId) {
        $sql = "SELECT u.email, u.prenom FROM inscriptions_evenements ie JOIN users u ON ie.id_user = u.id WHERE ie.id_evenement = ? AND ie.actif = b'1'";
        $stmt = $this->bdd->prepare($sql);
        $stmt->execute([$eventId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Vous pouvez ajouter ici d'autres méthodes liées à la gestion des utilisateurs
}

?>
