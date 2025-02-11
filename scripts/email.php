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

        $mail = new PHPMailer(true); // Créer une instance de PHPMailer

        try {
            // Charger la configuration avec la même méthode que config.php
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
            
            $mail->isSMTP();
            $mail->Host = 'ssl0.ovh.net';
            $mail->SMTPAuth = true;
            $mail->Username = 'contact@arrera-software.fr';
            $mail->Password = $_ENV['SMTP_PASSWORD'];  // Utilisation de $_ENV au lieu de $config
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
