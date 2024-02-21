<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php'; 

require_once('../DataBaseConnection.php');

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    try {
        $query = $bdd->prepare("SELECT * FROM users WHERE token = ? AND validate = '0'");
        $query->execute([$token]);
        $user = $query->fetch();

        if ($user) {
            $update = $bdd->prepare("UPDATE users SET validate = '1', token = '' WHERE token = ?");
            $update->execute([$token]);

            // Sélectionner tous les administrateurs
            $adminQuery = $bdd->prepare("SELECT email FROM users WHERE id_grade = 3");
            $adminQuery->execute();
            $admins = $adminQuery->fetchAll(PDO::FETCH_ASSOC);

            // Envoie un email à tous les administrateurs
            foreach ($admins as $admin) {

                
                $mail = new PHPMailer(true);
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'majtx69@gmail.com';
                $mail->Password = 'dzej lfqh ppff pjtn';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('majtx69@gmail.com', 'BDE');
                $mail->addAddress($admin['email']); // Email de l'administrateur

                $mail->isHTML(true);
                $mail->Subject = 'Nouvelle Inscription Confirmée';
                $mail->Body    = 'Une nouvelle inscription a été confirmée. Nom : ' . $user['nom'] . ', Email : ' . $user['email'];

                $mail->send();
            }

            echo "Votre compte a été activé avec succès. Vous pouvez maintenant vous connecter.";
        } else {
            echo "Ce lien de confirmation est invalide ou le compte a déjà été activé.";
        }
    } catch (Exception $e) {
        echo "Une erreur est survenue : " . $e->getMessage();
    }
} else {
    echo "Aucun token de validation fourni.";
}
?>
