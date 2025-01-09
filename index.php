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
                    <a href="">
                        <img src="img/file.webp" alt="Logo" class="logo-img">
                    </a>
                </div>
                <!-- Navigation -->
                <div class="header-links">
                    <a href="assitant" class="header-link">Assistant</a>
                    <a href="interface" class="header-link">Interface</a>
                    <a href="articles" class="header-link">Articles</a>
                    <a href="contact" class="header-link">Contact</a>
                    <a href="a-propos" class="header-link">À propos</a>
                    <?php
                        if (isset($_SESSION['identifiant'])) {
                            echo '<select class="header-link-connexion" onchange="location.href=this.value;">';
                            echo '<option value="">Bonjour, ' . $_SESSION['identifiant'] . ' !</option>';
                            echo '<option value="scripts/deconnexion">Se déconnecter</option>';
                            echo '</select>';
                        } 
                        else {
                                null;           
                        }
                    ?>
                    
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