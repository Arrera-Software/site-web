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
            <h1>Arrera Interface I2024</h1>
            <p>Première version de l'interface Arrera.</p>
            <a href="" class="download-link">Télécharger</a>
        </div>
        <section class="image-section">
            <img src="img/ArreraI2024.webp" alt="Arrera Interface I2024" class="img">
        </section>
    </div>

    <div class="container-g">
        <div class="text-section">
            <h1>Arrera Interface I2025</h1>
            <p>Prochaine version de l'interface Arrera.</p>
            <a href="" class="download-link">Voir les sources</a>
        </div>
        <section class="image-section">
            <img src="img/#.webp" alt="Arrera Interface I2025" class="img">
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
                <a href="#" class="download-link">Télécharger</a>
                <a href="#" class="learn-more">Code source</a>
            </div>
        </div>
        <div class="service-card">
            <div class="service-icon">
                <img src="img/arrera-raccourci.webp" alt="LOGO">
            </div>
            <h2>Arrera Raccourci</h2>
            <p>Module permettant d'avoir une interface pour accéder à des raccourcis web, lançable depuis les assistants.</p>
            <div class="service-links">
                <a href="#" class="download-link">Télécharger</a>
                <a href="#" class="learn-more">Code source</a>
            </div>
        </div>
        <div class="service-card">
            <div class="service-icon">
                <img src="img/ArreraTiger.webp" alt="LOGO">
            </div>
            <h2>Arrera Tiger</h2>
            <p>Module inclus directement dans l'interface pour installer les différents modules disponibles et les maintenir à jour.</p>
            <div class="service-links">
                <a href="#" class="download-link">Télécharger</a>
                <a href="#" class="learn-more">Code source</a>
            </div>
        </div>
        <div class="service-card">
            <div class="service-icon">
                <img src="img/ArreraVideoDownload.webp" alt="LOGO">
            </div>
            <h2>Arrera Video download</h2>
            <p>Application pour télécharger des vidéos YouTube, soit en vidéo, soit en musique.</p>
            <div class="service-links">
                <a href="#" class="download-link">Télécharger</a>
                <a href="#" class="learn-more">Code source</a>
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
