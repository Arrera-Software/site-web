<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A propos</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/a-propos.css">
    <link rel="icon" href="img/logo-arrera.webp">
</head>
<body>
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

    <main class="histoire-section">
        <img src="img/arrera-software.webp" alt="Arrera Software Logo" class="histoire-logo">
        <h1 class="histoire-title">Petit Histoire d'Arrera</h1><br><br>
        <p class="histoire-text">
            Arrera Software est une organisation de logiciels open source fondée par Baptiste P qui a commencé par créer un premier assistant nommé SIX en 2021. <br><br>
            Aujourd'hui, Arrera Software maintient trois assistants et une application lourde.
        </p>
        <hr class="separator">
        
        <h1 class="team-title" style="text-decoration: underline;">L'équipe Arrera-Software</h1>
        <div class="team-container">
            <div class="team-member">
                <a href="https://github.com/baptistepau" target="_blank">
                    <img src="img/baptiste.webp" alt="Baptiste P" class="member-img">
                </a>
                <h3>Baptiste P</h3>
                <p>Fondateur</p>
            </div>
            <div class="team-member">
                <a href="https://github.com/skoyzz" target="_blank">
                    <img src="img/skoyzz.webp" alt="Quentin B" class="member-img">
                </a>
                <h3>Quentin B</h3>
                <p>Développeur Web</p>
            </div>
            <div class="team-member">
                <img src="img/charlotte.webp" alt="Charlotte B" class="member-img">
                <h3>Charlotte B</h3>
                <p>Correctrice</p>
            </div>
            <div class="team-member">
                <img src="img/arnaud.webp" alt="Arnaud F" class="member-img">
                <h3>Arnaud F</h3>
                <p>Correcteur</p>
            </div>
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


</body>
</html>
