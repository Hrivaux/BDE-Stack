<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php'; 
require_once('../../global.php');

require_once '../class/user.php';
require_once '../mail/mailer.php';


$user = new User($bdd);

$mailer = new PHPMailer(true);
$mail = new Mailer($mailer);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $token = $user->register($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['password'], $_POST['password2'], $_POST['pseudo']);
        $mail->sendConfirmationEmail($_POST['email'], $_POST['nom'], $_POST['prenom'], $token);
        header('Location: ../../index.php?action=success');
    } catch (Exception $e) {
        header('Location: ../../register.php?inscription=' . urlencode($e->getMessage()));
    }
}
