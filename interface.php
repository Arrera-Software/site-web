<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/interface.css">
    <link rel="icon" href="img/logo-arrera.webp">
</head>
<body>
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

    <div class="container-g">
        <div class="text-section">
            <h1>Arrera I2025</h1>
            <p>Prochaine version de l'interface Arrera.</p>
        </div>
        <section class="image-section">
            <img src="img/i2025-icon.webp" alt="Arrera Interface I2025" class="img">
        </section>
        <a href = "https://github.com/Arrera-Software/Arrera-Interface/releases/tag/I2025-1.00" class="download-interface">Télécharger</a>
    </div>

    <div class="container-g">
        <div class="text-section">
            <h1>Arrera I2024</h1>
            <p>Première version de l'interface Arrera. (Plus maintenue)</p>
        </div>
        <section class="image-section">
            <img src="img/ArreraI2024.webp" alt="Arrera Interface I2024" class="img">
        </section>
    </div>

    <main class="services-container">
        <div class="service-card">
            <div class="service-icon">
                <img src="img/postite.webp" alt="LOGO">
            </div>
            <h2>Arrera Postite</h2>
            <p>Module de traitement de texte développé pour fonctionner avec les assistants d'Arrera</p>
            <div class="service-links">

                <a href="https://github.com/Arrera-Software/Arrera-Postite" class="learn-more">Code source</a>
            </div>
        </div>
        <div class="service-card">
            <div class="service-icon">
                <img src="img/arrera-raccourci.webp" alt="LOGO">
            </div>
            <h2>Arrera Raccourci</h2>
            <p>Module permettant d'avoir une interface pour accéder à des raccourcis web, lançable depuis les assistants.</p>
            <div class="service-links">

                <a href="https://github.com/Arrera-Software/Arrera-raccourci" class="learn-more">Code source</a>
            </div>
        </div>
        <div class="service-card">
            <div class="service-icon">
                <img src="img/ArreraVideoDownload.webp" alt="LOGO">
            </div>
            <h2>Arrera Video download</h2>
            <p>Application pour télécharger des vidéos YouTube, soit en vidéo, soit en musique.</p>
            <div class="service-links">

                <a href="https://github.com/Arrera-Software/Arrera-VideoDownload" class="learn-more">Code source</a>
            </div>
        </div>

        <!--<div class="service-card">
            <div class="service-icon">
                <img src="img/#.webp" alt="LOGO">
            </div>
            <h2>Titre application</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum.</p>
            <div class="service-links">
                <a href="#" class="download-link">Télécharger</a>
                <a href="#" class="learn-more">Code source</a>
                <a href="#" class="learn-more">Toutes les versions</a>
            </div>
        </div>-->

    </main>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <p class="copyright">
                © <?php echo date('Y'); ?> Arrera-Software | Tous droits réservés
            </p>
        </div>
    </footer>
</body>
</html>
