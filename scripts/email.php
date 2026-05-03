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

    // 1. Charger la configuration .env en premier
    // Cela permet d'utiliser $_ENV pour Cloudflare ET pour PHPMailer
    $envFile = dirname(__DIR__) . '/.env';
    if (file_exists($envFile)) {
        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
                list($key, $value) = explode('=', $line, 2);
                $_ENV[trim($key)] = trim($value);
            }
        }
    }

    // 2. Vérification du captcha Cloudflare Turnstile
    $turnstile_response = $_POST['cf-turnstile-response'] ?? '';
    // On récupère la clé depuis le .env, ou on met la clé en dur si elle n'y est pas (à remplacer)
    $turnstile_secret = $_ENV['TURNSTILE_SECRET_KEY'] ?? 'VOTRE_CLE_SECRETE';

    if (empty($turnstile_response)) {
        $_SESSION['toast'] = [
            'type' => 'error',
            'message' => 'Veuillez valider le test anti-robot.'
        ];
        header('Location: ../contact.php');
        exit();
    }

    // Appel à l'API de Cloudflare
    $verify_data = [
        'secret' => $turnstile_secret,
        'response' => $turnstile_response,
        'remoteip' => $_SERVER['REMOTE_ADDR']
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($verify_data)
        ]
    ];

    $context  = stream_context_create($options);
    $result = file_get_contents('https://challenges.cloudflare.com/turnstile/v0/siteverify', false, $context);
    $response = json_decode($result);

    // Si Cloudflare renvoie une erreur (robot détecté ou jeton invalide)
    if (!$response || !$response->success) {
        $_SESSION['toast'] = [
            'type' => 'error',
            'message' => 'La validation anti-robot a échoué. Veuillez réessayer.'
        ];
        header('Location: ../contact.php');
        exit();
    }

    // --- LE CAPTCHA EST VALIDE, ON CONTINUE ---

    // 3. Validation et assainissement des entrées
    $nom = htmlspecialchars(trim(filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING)));
    $prenom = htmlspecialchars(trim(filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING)));
    $email = filter_var(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)), FILTER_VALIDATE_EMAIL);
    $sujet = htmlspecialchars(trim(filter_input(INPUT_POST, 'sujet', FILTER_SANITIZE_STRING)));
    $message = htmlspecialchars(trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING)));

    // Vérification de l'email
    if ($email === false) { 
        echo "<script>alert('Adresse email invalide.');</script>"; 
        header('Location: ../contact.php'); 
        exit(); 
    }

    // 4. Envoi de l'email avec PHPMailer
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'ssl0.ovh.net';
        $mail->SMTPAuth = true;
        $mail->Username = 'contact@arrera-software.fr';
        $mail->Password = $_ENV['SMTP_PASSWORD']; 
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        
        // Configuration de base
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('contact@arrera-software.fr', 'Contact Arrera Software');
        $mail->addAddress('contact@arrera-software.fr');
        $mail->addReplyTo($email, "$nom $prenom");

        // Contenu de l'email
        $mail->isHTML(false);
        $mail->Subject = "Nouveau message de " . $nom . " " . $prenom . " : " . $sujet;
        $mail->Body = "De: $nom $prenom\nEmail: $email\nSujet: $sujet\n\nMessage:\n$message";

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
        error_log("Erreur complète PHPMailer: " . $e->getMessage());
        $_SESSION['toast'] = [
            'type' => 'error',
            'message' => 'Une erreur est survenue lors de l\'envoi de l\'email : ' . $e->getMessage()
        ];
        header('Location: ../contact.php');
        exit();
    }
}
?>