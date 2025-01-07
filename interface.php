<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/interface.css">
</head>
<body>
    <!-- Header principal -->
    <header class="main-header">
        <div class="container">
            <div class="header-content">
                <!-- Logo -->
                <div class="logo">
                    <a href="index">
                        <img src="img/file.webp" alt="Logo" class="logo-img">
                    </a>
                </div>
                <!-- Navigation -->
                <div class="header-links">
                    <a href="index" class="header-link">Accueil</a>
                    <a href="assitant" class="header-link">Assistant</a>
                    <a href="interface" class="header-link">Interface</a>
                    <a href="contact" class="header-link">Contact</a>
                    <a href="a-propos" class="header-link">À propos</a>
                </div>
            </div>
        </div>
    </header>

    <div class="container-g">
        <div class="text-section">
            <h1>Bienvenue dans l'Interface</h1>
            <p>Cette section est dédiée à l'interaction avec nos assistants.</p>
        </div>
        <section class="image-section">
            <img src="img/logo-arrera.webp" alt="Arrera Software" class="img">
        </section>
    </div>

    

    <main class="services-container">
        <div class="service-card">
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
