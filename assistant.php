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
            <h1>Des assistants intelligents,<br>pour votre productivité</h1>
            <p class="hero-subtitle">Open source fonctionnant sur un base unique uniquement en local</p>
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
                    <a href="" class="learn-more">Découvrir</a>
                    <a href="<?php echo getLink($pdo,'download-six'); ?>" class="download-link">Télécharger</a>
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
                    <a href="" class="learn-more">Découvrir</a>
                    <a href="<?php echo getLink($pdo,'download-ryley'); ?>" class="download-link">Télécharger</a>
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
                    <a href="" class="learn-more">Découvrir</a>
                    <a href="<?php echo getLink($pdo,'download-copilote'); ?>" class="download-link">Télécharger</a>
                </div>
            </div>
        </section>

        <section class="components-section">
            <h2>Composant des assistants</h2>
            <p class="section-subtitle">Brique logicielle des assistants Arrera Software</p>
            
            <div class="components-grid">
                <!-- Composant 1 -->
                <div class="component-card">
                    <h3>Arrera Neuron Network</h3>
                    <p>Base centrale des 3 assistants Arrera Software.Qui permet au assistant d'avoir tout c'est fonctionnalités.</p>
                </div>

                <!-- Composant 2 -->
                <div class="component-card">
                    <h3>Arrera Gazelle</h3>
                    <p>Interface des parametres utiliser dans les assistants. Il existe 2 version une pour Arrera SIX et une pour Arrera RYLEY et Arrera Copilote.</p>
                </div>

                <!-- Composant 3 -->
                <div class="component-card">
                    <h3>Arrera Lynx</h3>
                    <p>Arrera Lynx est l'interface qui se lance au premier démarrage des assistants. Elle permet de configurer au mieux vos assistants</p>
                </div>

                 <!-- Composant 4 -->
                <div class="component-card">
                    <h3>Integration de model d'IA local</h3>
                    <p>Depuis leurs version I2026 (Arrera Neuron Network version 3) les assistant d'Arrera Software on la possibiliter d'utiliser des model d'inteligence Artificielle tournant en local. les model utiliser sont Gemma, Mistral et LLAMA</p>
                </div>

                <div class="component-card">
                    <h3>Communication avec Arrera</h3>
                    <p>Grace un websocket depuis les version I2025. Les assistant comunique et inversement avec l'application Arrera ce qui permet au assistant d'utiliser les fonctionnalités de l'application et inversement.</p>
                </div>

            </div>
        </section>
    </main>



    <?php include 'header-footer/footer.php'; ?>




</body>
</html>
