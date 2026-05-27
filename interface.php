<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface - Arrera</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/interface.css">
    <link rel="icon" href="img/logo-arrera.webp">
</head>
<body>
    <?php include 'header-footer/header.php'; 

    $btnFile= 'scripts/script_link_btn.php';
    if (!file_exists($btnFile)) {
        die('Fichier de configuration introuvable.');
    }
    require_once $btnFile;

    $configFile = 'config.php';
    if (!file_exists($configFile)) {
        die('Fichier de configuration introuvable.');
    }
    require_once $configFile;

    ?>

    <nav class="pill-nav">
        <a href="#i2026" class="pill-btn active">VERSION 2026</a>
        <a href="#i2025" class="pill-btn">VERSION 2025</a>
        <a href="#i2024" class="pill-btn">VERSION 2024</a>
        <a href="#modules" class="pill-btn">MODULES</a>
    </nav>

    <div id="i2026" class="container-box i2026-card">
        <div class="text-section">
            <h1 class="app-title">Arrera I2026</h1>
            <p class="app-description">Reprise de la base de l'interface I2025, avec un changement de design pour quelque chose de plus moderne, tout en gardant la même ergonomie que la version I2025. Refonte complète de la partie communication avec les assistants pour plus de fonctionnalités et de stabilité.</p>
        </div>
        <div class="image-section">
            <img src="img/I2026-Icon.webp" alt="Arrera I2026" class="hero-img">
        </div>
        <a href="<?php echo getLink($pdo,'download-interface-i2026'); ?>" class="btn-primary btn-download-absolute">Télécharger</a>
    </div>

    <div id="i2025" class="container-box reverse i2025-card">
        <div class="text-section">
            <h2 class="app-title">Arrera I2025</h2>
            <p class="app-description">Refonte totale de l'interface par rapport à la version I2024. Inspiration du design de l'interface de NexStep OS. Début de la communication avec les assistants d'Arrera.</p>
        </div>
        <div class="image-section">
            <img src="img/i2025-icon.webp" alt="Arrera I2025" class="hero-img">
        </div>
        <a href="<?php echo getLink($pdo,'download-interface-i2025'); ?>" class="btn-secondary btn-download-absolute">Télécharger</a>
    </div>

    <div id="i2024" class="container-box i2024-card">
        <div class="text-section">
            <h2 class="app-title">Arrera I2024</h2>
            <p class="app-description">Première version de l'interface Arrera. (Plus maintenue)</p>
        </div>
        <div class="image-section">
            <img src="img/ArreraI2024.webp" alt="Arrera I2024" class="hero-img">
        </div>
    </div>

    <section id="modules" class="modules-section">
        <div class="modules-container">
            <h2 class="section-title center">Modules</h2>
            <p class="section-subtitle center">Étendez les capacités de votre écosystème Arrera.</p>
            
            <div class="modules-grid">
                <div class="module-card">
                    <img src="img/arrera_hub.webp" alt="Arrera Hub" class="module-icon">
                    <h3>Arrera Hub</h3>
                    <p>Application de gestion de l'ensemble des applications de l'écosystème Arrera.</p>
                    <div class="module-links">
                        <a href="hub.php" class="btn-module">Découvrir</a>
                    </div>
                </div>
                
                <div class="module-card">
                    <img src="img/arrera_md.webp" alt="Arrera Markdown" class="module-icon">
                    <h3>Arrera Markdown</h3>
                    <p>L'éditeur de Markdown de l'écosystème Arrera qui est boosté avec des modules d'intelligence artificielle grâce à la connexion avec les assistants d'Arrera</p>
                    <div class="module-links">
                        <a href="discoverArreraMd.php" class="btn-module">Découvrir</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'header-footer/footer.php'; ?>
    <script src="js/interface.js"></script>
</body>
</html>