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

    <main class="services-container">
        <section class="services-hero">
            <h1>Nos Assistants Intelligents</h1>
            <p class="hero-subtitle">Des outils puissants pour votre productivité</p>
        </section>

        <section class="services-grid">
            <!-- Arrera SIX -->
            <div class="service-card six-card">
                <div class="service-icon">
                    <img src="img/six-icon.webp" alt="Arrera SIX">
                </div>
                <div class="service-content">
                    <h2>Arrera SIX</h2>
                    <p>Arrera SIX est le premier assistant créé par Arrera. Il a pour but de lancer des tâches sur votre ordinateur à l'aide de commandes vocales.</p>
                </div>
                <div class="service-links">
                    <a href="<?php echo getLink($pdo,'download-six'); ?>" class="download-link">Télécharger</a>
                    <a href="https://github.com/Arrera-Software/Six" class="learn-more">Code source</a>
                    <a href="https://github.com/Arrera-Software/Six/releases" class="learn-more">Toutes les versions</a>
                </div>
            </div>
            <!-- Arrera RYLEY -->
            <div class="service-card ryley-card">
                <div class="service-icon">
                    <img src="img/ryley-icon.webp" alt="Arrera RYLEY">
                </div>
                <div class="service-content">
                    <h2>Arrera RYLEY</h2>
                    <p>Arrera Ryley est le deuxième assistant d'Arrera. Il a pour but de lancer des tâches, comme SIX, et de vous aider dans votre projet de développement grâce à la fonctionnalité CODEHELP. Contrôle uniquement par texte.</p>
                </div>
                <div class="service-links">
                    <a href="<?php echo getLink($pdo,'download-ryley'); ?>" class="download-link">Télécharger</a>
                    <a href="https://github.com/Arrera-Software/Ryley" class="learn-more">Code source</a>
                    <a href="https://github.com/Arrera-Software/Ryley/releases" class="learn-more">Toutes les versions</a>
                </div>
            </div>

            <!-- Arrera COPILOTE -->
            <div class="service-card copilote-card">
                <div class="service-icon">
                    <img src="img/copilot-icon.webp" alt="Arrera COPILOTE">
                </div>
                <div class="service-content">
                    <h2>Arrera COPILOTE</h2>
                    <p>Arrera COPILOTE est le dernier assistant d'Arrera. Il propose une interface regroupant les deux assistants d'Arrera avec toutes leurs fonctionnalités. De plus, il offre deux modes de contrôle : vocal et texte.</p>
                </div>
                <div class="service-links">
                    <a href="<?php echo getLink($pdo,'download-copilote'); ?>" class="download-link">Télécharger</a>
                    <a href="https://github.com/Arrera-Software/Arrera-Copilote" class="learn-more">Code source</a>
                    <a href="https://github.com/Arrera-Software/Arrera-Copilote/releases" class="learn-more">Toutes les versions</a>
                </div>
            </div>
        </section>
    </main>



    <?php include 'header-footer/footer.php'; ?>




</body>
</html>
