<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

class Mailer {
    private $mailer;

    public function __construct(PHPMailer $mailer) {
        $this->mailer = $mailer;
    }

    public function sendConfirmationEmail($email, $nom, $prenom, $token) {
        // Configuration et envoi de l'email de confirmation
        $this->setupMailer();
        $this->mailer->addAddress($email, $nom);
        $this->mailer->Subject = 'Confirmation d\'inscription';
        $this->mailer->Body = "Bonjour $nom $prenom, <br><br>Merci de cliquer sur le lien suivant pour confirmer votre inscription : <a href='http://localhost:3000/inc/class/validateToken.php?token=$token'>Confirmer mon inscription</a>";
        $this->mailer->send();
    }

    public function sendNotificationEmail($email, $subject, $body) {
        // Configuration et envoi de l'email de notification aux administrateurs
        $this->setupMailer();
        $this->mailer->addAddress($email);
        $this->mailer->Subject = $subject;
        $this->mailer->Body = $body;
        $this->mailer->send();
    }

    private function setupMailer() {
        // Configuration commune de PHPMailer
        $this->mailer->isSMTP();
        $this->mailer->Host = 'smtp.gmail.com';
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = 'majtx69@gmail.com'; // Remplacez par votre adresse e-mail réelle
        $this->mailer->Password = 'dzej lfqh ppff pjtn'; // Remplacez par votre mot de passe réel
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mailer->Port = 587;
        $this->mailer->setFrom('majtx69@gmail.com', 'BDE'); // Remplacez par votre adresse e-mail réelle
        $this->mailer->isHTML(true);
    }
}