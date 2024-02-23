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

        $this->setupMailer();
        $this->mailer->addAddress($email, $nom);
        $this->mailer->Subject = 'Confirmation d\'inscription';
        $this->mailer->Body = "Bonjour $nom $prenom, <br><br>Merci de cliquer sur le lien suivant pour confirmer votre inscription : <a href='http://localhost:3000/inc/class/validateToken.php?token=$token'>Confirmer mon inscription</a>";
        $this->mailer->send();
    }

    public function sendNotificationEmail($email, $subject, $body) {
        $this->setupMailer();
        $this->mailer->addAddress($email);
        $this->mailer->Subject = $subject;
        $this->mailer->Body = $body;
        $this->mailer->send();
    }

    public function sendEventRegistrationEmail($email, $prenom, $nomEvenement, $dateEvenement, $adresse, $ville) {
        $this->setupMailer();
        $this->mailer->addAddress($email);
        $this->mailer->Subject = "Inscription à l'événement confirmée";
        $this->mailer->Body = "Bonjour $prenom, <br><br>Vous êtes bien inscrit(e) à l'événement <strong>$nomEvenement</strong> qui se tiendra le $dateEvenement à $adresse, $ville.<br><br>Nous sommes impatients de vous y voir !";
        $this->mailer->send();
    }

    public function sendLowRegistrationNotification($email, $eventName, $eventDate) {
        $this->setupMailer();
        $this->mailer->addAddress($email);
        $this->mailer->Subject = "Peu d'inscriptions pour votre événement $eventName";
        $this->mailer->Body = "Bonjour, <br><br> Nous avons remarqué que votre événement \"$eventName\" prévu le $eventDate a moins de 5 inscriptions. Vous voudrez peut-être prendre des mesures pour promouvoir davantage votre événement. <br><br> Cordialement, <br> Votre équipe BDE";
        $this->mailer->send();
    }

    public function sendEventReminder($email, $prenom, $eventName, $eventDate, $adresse, $ville) {
            $this->setupMailer();
            $this->mailer->clearAddresses();
            $this->mailer->addAddress($email, $prenom);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'Rappel d\'événement : ' . $eventName;
            $this->mailer->Body = "Bonjour $prenom, <br><br>Nous vous rappelons que vous êtes inscrit(e) à l'événement \"$eventName\" qui aura lieu demain, le $eventDate, à $adresse, $ville.<br><br>Nous avons hâte de vous y voir !";
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
        $this->mailer->CharSet = 'UTF-8'; 
    }
}
