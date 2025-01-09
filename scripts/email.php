<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Charger l'autoloader de Composer

// Vérifier si le fichier de configuration existe
if (!file_exists('../configmail.php')) {
    die('Le fichier de configuration est manquant'); // Arrêter l'exécution si le fichier de configuration est manquant
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Vérifier si la méthode de requête est POST
    // Validation et assainissement des entrées
    // Récupère et assainit le nom
    $nom = htmlspecialchars(trim(filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING))); // Envoie le nom
    // Récupère et assainit le prénom
    $prenom = htmlspecialchars(trim(filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING))); // Envoie le prénom
    // Récupère et valide l'email
    $email = filter_var(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)), FILTER_VALIDATE_EMAIL); // Envoie l'email
    // Récupère et assainit le sujet
    $sujet = htmlspecialchars(trim(filter_input(INPUT_POST, 'sujet', FILTER_SANITIZE_STRING))); // Envoie le sujet
    // Récupère et assainit le message
    $message = htmlspecialchars(trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING))); // Envoie le message

    // Vérification de l'email
    if ($email === false) { // Si l'email est invalide
        echo "<script>alert('Adresse email invalide.');</script>"; // Alerte pour email invalide
        header('Location: ../contact.php'); // Rediriger vers la page de contact
        exit(); // Terminer le script
    }

    $config = require '../configmail.php'; // Inclure le fichier de configuration

    $mail = new PHPMailer(true); // Créer une instance de PHPMailer

    try {
        // Paramètres du serveur SMTP
        $mail->isSMTP(); // Utiliser SMTP
        $mail->Host = 'smtp.mail.ovh.net'; // Définir le serveur SMTP
        $mail->SMTPAuth = true; // Activer l'authentification SMTP
        $mail->Username = 'contact@arrera-software.fr'; // Définir l'adresse email
        $mail->Password = $config['smtp_password']; // Utiliser le mot de passe du fichier de configuration
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Activer le cryptage SMTPS
        $mail->Port = 465; // Définir le port SMTP

        // Définir l'encodage UTF-8 pour l'email
        $mail->CharSet = 'UTF-8'; // Définir l'encodage

        // Destinataires
        $mail->setFrom($email, "$nom $prenom"); // Définir l'expéditeur
        $mail->addAddress('contact@arrera-software.fr'); // Ajouter le destinataire

        // Contenu de l'email
        $mail->isHTML(false); // Définir le format de l'email
        $mail->Subject = "Nouveau message de " . $nom . " " . $prenom . " à propos de : " . $sujet; // Sujet de l'email
        $mail->Body = "Informations du client:\nNom: " . $nom . "\nPrénom: " . $prenom . "\nEmail: " . $email . "\nSujet: " . $sujet . "\n\nMessage:\n" . $message . "\n"; // Corps de l'email

        // S'assurer que l'encodage est bien UTF-8
        header('Content-Type: text/html; charset=utf-8'); // Définir l'encodage de la réponse

        // Traitement de l'envoi du message
        if ($mail->send()) { // Si l'email est envoyé avec succès
            echo "<script>alert('Votre message a été envoyé avec succès ! Nous allons revenir très vite vers vous !');</script>"; // Alerte de succès
            header('Location: ../contact.php'); // Rediriger vers la page de contact
            exit(); // Terminer le script
        } else { // Si l'envoi échoue
            echo "<script>alert('Erreur lors de l\'envoi du message. Veuillez réessayer plus tard !');</script>"; // Alerte d'erreur
            header('Location: ../contact.php'); // Rediriger vers la page de contact
            exit(); // Terminer le script
        }
    } catch (Exception $e) { // Gérer les exceptions
        echo "<script>alert('Une erreur est survenue lors de l\'envoi de l\'email !');</script>"; // Alerte d'erreur
        header('Location: ../contact.php'); // Rediriger vers la page de contact
        exit(); // Terminer le script
    }
}
?>
