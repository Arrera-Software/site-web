<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/hub.css">
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

    <section class="hero-section">
        <div class="hero-content">
            <img src="img/arrera_hub.webp" alt="Icône Arrera Hub" class="app-icon">
            <h1 class="app-title">Arrera Hub</h1>
            <p class="app-description">Application de gestion de l'ensembles des applications de l'ecosystème Arrera</p>
            <a href="<?php echo getLink($pdo,'tiger-download'); ?>" class="btn-primary">Obtenir</a>
        </div>
    </section>

    <section class="tech-section">
        <div class="tech-container">
            <h2 class="section-title">L'innovation au cœur du système.</h2>
            <p class="section-subtitle">Découvrez l'architecture technique qui rend Arrera Hub si fluide et puissant.</p>
            
            <div class="tech-grid">

                <div class="tech-card">
                    <img src="img/cpp.webp" alt="C++ icone" class="tech-icon">
                    <h3>Performance Native</h3>
                    <p>Développé en C++, Arrera Hub tire parti d'une puissance brute. Profitez d'une exécution ultra-rapide et d'une réactivité instantanée pour la gestion de votre écosystème.</p>
                </div>

                <div class="tech-card">
                    <img src="img/qt.webp" alt="QT icone" class="tech-icon">
                    <h3>Interface Fluide</h3>
                    <p>Propulsé par le célèbre framework Qt, Arrera Hub arbore un thème visuel exclusif, conçu pour s'harmoniser parfaitement avec l'écosystème Arrera. Son design offre une navigation d'une fluidité absolue et une élégance sans compromis.</p>
                </div>

                <div class="tech-card">
                    <img src="" alt="" class="tech-icon">
                    <h3>Architecture Robuste</h3>
                    <p>L'alliance du C++ et de Qt crée une fondation solide comme le roc. Votre centre de contrôle est conçu pour tourner en arrière-plan avec une stabilité et une fiabilité à toute épreuve.</p>
                </div>

                <div class="tech-card">
                    <img src="" alt="" class="tech-icon">
                    <h3>Mises à jour Intelligentes</h3>
                    <p>Chaque application intègre un module de communication dédié. Arrera Hub détecte ainsi instantanément les nouvelles versions et vous indique avec précision quand une mise à jour est requise pour maintenir votre écosystème au top.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="showcase-section">
        <div class="showcase-container">
            <div class="showcase-header">
                <h2 class="section-title">Une vue d'ensemble sur votre écosystème.</h2>
                <p class="section-subtitle">Gérez vos applications et vos mises à jour depuis une interface claire et intuitive.</p>
            </div>
            
            <div class="showcase-images">
                <div class="showcase-item">
                    <img src="" alt="Interface d'accueil Arrera Hub" class="showcase-img">
                    <p class="showcase-caption">Tableau de bord central</p>
                </div>
                
                <div class="showcase-item">
                    <img src="" alt="Interface de mise à jour Arrera Hub" class="showcase-img">
                    <p class="showcase-caption">Centre des mises à jour</p>
                </div>
            </div>
        </div>
    </section>


    <?php include 'header-footer/footer.php'; ?>

</body>