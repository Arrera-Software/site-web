<?php
    session_start();

// Débogage des erreurs
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Vérification du fichier .env
$envFile = __DIR__ . '/.env';
if (!file_exists($envFile)) {
    error_log("Fichier .env introuvable dans : " . $envFile);
} else {
    $config = parse_ini_file($envFile);
    error_log("Configuration SMTP trouvée : " . (isset($config['SMTP_PASSWORD']) ? 'Oui' : 'Non'));
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="icon" href="img/logo-arrera.webp">
</head>

<body>
    <?php
    // Afficher le toast s'il existe
    if (isset($_SESSION['toast'])) {
        echo '<div class="toast ' . $_SESSION['toast']['type'] . '">' . 
             $_SESSION['toast']['message'] . 
             '</div>';
        unset($_SESSION['toast']);
    }
    ?>

    <!-- Header principal -->
    <!-- Header principal -->
    <header class="main-header">
        <div class="container">
            <div class="header-content">
            <!-- Logo -->
            <div class="logo">
                <a href="">
                <img src="img/file.webp" alt="Logo" class="logo-img">
                </a>
            </div>
            
            <!-- Hamburger button -->
            <script>
                function toggleMenu() {
                    var menuItems = document.querySelector('.mobile-nav');
                    menuItems.classList.toggle('hidden');
                }
            </script>
            <button class="hamburger-menu" onclick="toggleMenu()">&#9776;</button>
            
            <!-- Navigation -->
            <div class="header-links">
                <a href="assistant" class="header-link">Assistant</a>
                <a href="interface" class="header-link">Interface</a>
                <a href="store" class="header-link">Store</a>
                <a href="articles" class="header-link">Articles</a>
                <a href="contact" class="header-link">Contact</a>
                <a href="a-propos" class="header-link">À propos</a>
                <?php
                if (isset($_SESSION['identifiant'])) {
                    echo '<div class="header-link-connexion">';
                    echo 'Bonjour, ' . $_SESSION['identifiant'];
                    echo '<div class="dropdown-menu">';
                    echo "Rôle : " . $_SESSION['role']; // Afficher le rôle
                    echo '<a href="scripts/deconnexion">Se déconnecter</a>';
                    echo '</div>';
                    echo '</div>';
                } 
                else {
                        null;           
                }
                ?>
            </div>

            <!-- Mobile Navigation -->
            <div class="mobile-nav hidden">
                <a href="assistant" class="mobile-link">Assistant</a>
                <a href="interface" class="mobile-link">Interface</a>
                <a href="store" class="mobile-link">Store</a>
                <a href="articles" class="mobile-link">Articles</a>
                <a href="contact" class="mobile-link">Contact</a>
                <a href="a-propos" class="mobile-link">À propos</a>
            </div>
            
            </div>
        </div>
    </header>
    
    <main class="contact-container">
        <div class="contact-form-wrapper">
            <h1>Contactez-nous</h1>
            <form class="contact-form" method="POST" action="scripts/email.php">
                <div class="form-group">
                    <input type="text" id="name" name="nom" required 
                        value="<?php echo isset($_SESSION['form_data']['nom']) ? htmlspecialchars($_SESSION['form_data']['nom']) : ''; ?>">
                    <label for="name">Nom</label>
                </div>

                <div class="form-group">
                    <input type="text" id="prenom" name="prenom" required
                        value="<?php echo isset($_SESSION['form_data']['prenom']) ? htmlspecialchars($_SESSION['form_data']['prenom']) : ''; ?>">
                    <label for="prenom">Prénom</label>
                </div>

                <div class="form-group">
                    <input type="email" id="email" name="email" required
                        value="<?php echo isset($_SESSION['form_data']['email']) ? htmlspecialchars($_SESSION['form_data']['email']) : ''; ?>">
                    <label for="email">Email</label>
                </div>

                <div class="form-group">
                    <input type="text" id="subject" name="sujet" required
                        value="<?php echo isset($_SESSION['form_data']['sujet']) ? htmlspecialchars($_SESSION['form_data']['sujet']) : ''; ?>">
                    <label for="subject">Sujet</label>
                </div>

                <div class="form-group">
                    <textarea id="message" name="message" required><?php echo isset($_SESSION['form_data']['message']) ? htmlspecialchars($_SESSION['form_data']['message']) : ''; ?></textarea>
                    <label for="message">Message</label>
                </div>

                <div class="form-group">
                    <img src="scripts/generate_captcha.php" alt="CAPTCHA" id="captchaImage">
                    <button type="button" onclick="refreshCaptcha()" class="refresh-captcha">Rafraîchir</button>
                    <input type="text" id="captcha" name="captcha" required>
                    <label for="captcha">Entrez le code ci-dessus</label>
                </div>

                <button type="submit" class="submit-btn">Envoyer</button>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <p class="copyright">
                © <?php echo date('Y'); ?> Arrera-Software | Tous droits réservés
            </p>
        </div>
    </footer>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const toast = document.querySelector('.toast');
        if (toast) {
            setTimeout(() => {
                toast.remove();
            }, 3000);
        }
    });

    function refreshCaptcha() {
        document.getElementById('captchaImage').src = 'scripts/generate_captcha.php?' + new Date().getTime();
    }
    </script>

</body>

</html>