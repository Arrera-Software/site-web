<!-- Header principal -->
<header class="main-header">
    <div class="container">
        <div class="header-content">
        <!-- Logo -->
        <div class="logo">
            <a href="/index">
            <img src="../img/arrera-software.webp" alt="Logo" class="logo-img">
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
            <a href="/assistant" class="header-link">Assistant</a>
            <a href="/interface" class="header-link">Interface</a>
            <a href="/hub" class="header-link">Hub</a>
            <!--<a href="/linux" class="header-link">Arrera Linux</a>-->
            <a href="/articles" class="header-link">Articles</a>
            <a href="/contact" class="header-link">Contact</a>
            <a href="/a-propos" class="header-link">À propos</a>
            <?php
            if (isset($_SESSION['identifiant'])) {
                echo '<div class="header-link-connexion">';
                echo 'Bonjour, ' . $_SESSION['identifiant'];
                echo '<div class="dropdown-menu">';
                echo "Rôle : " . $_SESSION['role']; // Afficher le rôle
                echo '<a href="/manage/manage_article">Manage articles</a>';
                echo '<a href="/manage/manage_btn">Manage buttons</a>';
                echo '<a href="/scripts/deconnexion">Se déconnecter</a>';
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
            <a href="hub" class="mobile-link">Hub</a>
            <!--<a href="linux" class="mobile-link">Arrera Linux</a>-->
            <a href="articles" class="mobile-link">Articles</a>
            <a href="contact" class="mobile-link">Contact</a>
            <a href="a-propos" class="mobile-link">À propos</a>
            <?php
            // Afficher les actions de l'utilisateur dans le menu mobile si connecté
            if (isset($_SESSION['identifiant'])) {
                echo '<div class="mobile-user">';
                echo '<div class="mobile-user-greeting">Bonjour, ' . htmlspecialchars($_SESSION['identifiant']) . '</div>';
                echo '<a class="mobile-link" href="/manage/manage_article">Gestion des articles</a>';
                echo '<a class="mobile-link" href="/manage/manage_btn">Gestion des boutons</a>';
                echo '<a class="mobile-link" href="/scripts/deconnexion">Se déconnecter</a>';
                echo '</div>';
            }
            ?>
        </div>
        
        </div>
    </div>
</header>