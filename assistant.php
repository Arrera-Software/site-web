<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assitant</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/assistant.css">
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

    <main class="services-container">
        <section class="services-hero">
            <h1>Nos Assistants Intelligents</h1>
            <p class="hero-subtitle">Des outils puissants pour votre productivité</p>
        </section>

        <section class="services-grid">
            <!-- Arrera SIX -->
            <div class="service-card">
                <div class="service-icon">
                    <img src="img/six-icon.webp" alt="Arrera SIX">
                </div>
                <h2>Arrera SIX</h2>
                <p>Arrera SIX est le premier assistant créé par Arrera. Il a pour but de lancer des tâches sur votre ordinateur à l'aide de commandes vocales.</p>
                <div class="service-links">
                    <a href="https://github.com/Arrera-Software/Six/releases/tag/I2025-1.01" class="download-link">Télécharger</a>
                    <a href="https://github.com/Arrera-Software/Six" class="learn-more">Code source</a>
                    <a href="https://github.com/Arrera-Software/Six/releases" class="learn-more">Toutes les versions</a>
                </div>
            </div>

            <!-- Arrera RYLEY -->
            <div class="service-card">
                <div class="service-icon">
                    <img src="img/ryley-icon.webp" alt="Arrera RYLEY">
                </div>
                <h2>Arrera RYLEY</h2>
                <p>Arrera Ryley est le deuxième assistant d'Arrera. Il a pour but de lancer des tâches, comme SIX, et de vous aider dans votre projet de développement grâce à la fonctionnalité CODEHELP. Contrôle uniquement par texte.</p>
                <div class="service-links">
                    <a href="https://github.com/Arrera-Software/Ryley/releases/tag/I2025-1.01" class="download-link">Télécharger</a>
                    <a href="https://github.com/Arrera-Software/Ryley" class="learn-more">Code source</a>
                    <a href="https://github.com/Arrera-Software/Ryley/releases" class="learn-more">Toutes les versions</a>
                </div>
            </div>

            <!-- Arrera COPILOTE -->
            <div class="service-card">
                <div class="service-icon">
                    <img src="img/copilot-icon.webp" alt="Arrera COPILOTE">
                </div>
                <h2>Arrera COPILOTE</h2>
                <p>Arrera COPILOTE est le dernier assistant d'Arrera. Il propose une interface regroupant les deux assistants d'Arrera avec toutes leurs fonctionnalités. De plus, il offre deux modes de contrôle : vocal et texte.</p>
                <div class="service-links">
                    <a href="https://github.com/Arrera-Software/Arrera-Copilote/releases/tag/I2025-1.00" class="download-link">Télécharger</a>
                    <a href="https://github.com/Arrera-Software/Arrera-Copilote" class="learn-more">Code source</a>
                    <a href="https://github.com/Arrera-Software/Arrera-Copilote/releases" class="learn-more">Toutes les versions</a>
                </div>
            </div>
        </section>
    </main>



      <!-- Footer -->
      <footer class="main-footer">
        <div class="container">
            <p class="copyright">
                © 2025 Arrera-Software | Tous droits réservés
            </p>
        </div>
    </footer>




</body>
</html>
