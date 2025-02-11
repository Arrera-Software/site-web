<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Charger l'autoloader de Composer

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") { // Vérifier si la méthode de requête est POST
    // Sauvegarder les données du formulaire dans la session
    $_SESSION['form_data'] = [
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email'],
        'sujet' => $_POST['sujet'],
        'message' => $_POST['message']
    ];

    // Vérification du captcha
    $captcha_input = strtoupper(trim($_POST['captcha']));
    if (!isset($_SESSION['captcha_text']) || $captcha_input !== $_SESSION['captcha_text']) {
        $_SESSION['toast'] = [
            'type' => 'error',
            'message' => 'Code de vérification incorrect. Veuillez réessayer.'
        ];
        header('Location: ../contact.php');
        exit();
    }
    // Supprimer le captcha de la session
    unset($_SESSION['captcha_text']);

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

    $config = parse_ini_file('../.env'); // Charger les variables d'environnement depuis le fichier .env

    $mail = new PHPMailer(true); // Créer une instance de PHPMailer

    try {
        // Paramètres du serveur SMTP
        $mail->isSMTP(); // Utiliser SMTP
        $mail->Host = 'smtp.mail.ovh.net'; // Définir le serveur SMTP
        $mail->SMTPAuth = true; // Activer l'authentification SMTP
        $mail->Username = 'contact@arrera-software.fr'; // Définir l'adresse email
        $mail->Password = $config['SMTP_PASSWORD']; // Utiliser $config au lieu de $_ENV
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
        if ($mail->send()) {
            // Nettoyer les données du formulaire de la session
            unset($_SESSION['form_data']);
            $_SESSION['toast'] = [
                'type' => 'success',
                'message' => 'Votre message a été envoyé avec succès ! Nous allons revenir très vite vers vous !'
            ];
            header('Location: ../contact.php');
            exit();
        } else {
            $_SESSION['toast'] = [
                'type' => 'error',
                'message' => 'Erreur lors de l\'envoi du message. Veuillez réessayer plus tard !'
            ];
            header('Location: ../contact.php');
            exit();
        }
    } catch (Exception $e) {
        $_SESSION['toast'] = [
            'type' => 'error',
            'message' => 'Une erreur est survenue lors de l\'envoi de l\'email !'
        ];
        header('Location: ../contact.php');
        exit();
    }
}
?>
