<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="img/logo-arrera.webp">
</head>

<body>
    <!-- Header principal -->
    <header class="main-header">
        <div class="container">
            <div class="header-content">
            <!-- Logo -->
            <div class="logo">
                <a href="index">
                <img src="img/arrera-software.webp" alt="Logo" class="logo-img">
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

    <!-- Section de présentation style Apple -->
    <section class="hero-section dark-theme">
        <div class="container-accueil">
            <h1 class="title">Arrera Software<br></h1>
            <h2 class="texte">Une organisation de développement de logiciels open-source spécialisée dans les assistants
                personnels.</h2>
                
        </div>
    </section>

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