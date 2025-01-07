<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $sujet = $_POST['sujet'];
    $message = $_POST['message'];

    $config = require '../config.php'; // Inclure le fichier de configuration

    $mail = new PHPMailer(true);

    try {
        // Paramètres du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.mail.ovh.net'; // Remplacez par votre serveur SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'contact@arrera-software.com'; // Remplacez par votre adresse email
        $mail->Password = $config['smtp_password']; // Utilisez le mot de passe de votre fichier config.php
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Définir l'encodage UTF-8 pour l'email
        $mail->CharSet = 'UTF-8';

        // Destinataires
        $mail->setFrom($email, "$nom $prenom");
        $mail->addAddress('contact@arrera-software.com');

        // Contenu de l'email
        $mail->isHTML(false);
        $mail->Subject = "Nouveau message de $nom $prenom à propos de : $sujet";
        $mail->Body = "Informations du client:\nNom: $nom\nPrénom: $prenom\nEmail: $email\nSujet: $sujet\n\nMessage:\n$message\n";


      // S'assurer que l'encodage est bien UTF-8
    header('Content-Type: text/html; charset=utf-8');

    // Traitement de l'envoi du message
    if ($mail->send()) {
        echo "<script>alert('Votre message a été envoyé avec succès ! Nous allons revenir très vite vers vous !');</script>";
        header('Location: ../contact.php');
        exit();
    } else {
        echo "<script>alert('Erreur lors de l\'envoi du message. Veuillez réessayer plus tard !');</script>";
        header('Location: ../contact.php');
        exit();
    }
    } catch (Exception $e) {
        echo "<script>alert('Une erreur est survenue lors de l\'envoi de l\'email !');</script>";
        header('Location: ../contact.php');
        exit();
    }
}
?>