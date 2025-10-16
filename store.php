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
    <link rel="stylesheet" href="css/store.css">
    <link rel="icon" href="img/logo-arrera.webp">
</head>
<body>
    <?php include 'header-footer/header.php'; ?>

    <div class="container-g">
        <div class="text-section">
            <h1>Arrera Store</h1>
            <p>Magasin d'applications d'Arrera qui permet d'installer, de mettre à jour et de désinstaller toutes les applications Arrera.</p>
        </div>
        <section class="image-section">
            <img src="img/arrera-tiger.webp" alt="Arrera Interface I2024" class="img">
        </section>
        <!--<p class="download-interface">Sort bientôt</p>-->
        <a href="https://github.com/Arrera-Software/arrera-tiger-updater/releases/tag/1.00" class="download-interface">Télécharger l'installateur</a>
    </div>

    <div class="title-session">
        <h1>Composant de l'Arrera Store</h1>
    </div>

    <main class="services-container">

        <div class="service-card">
            <h2>GUI Arrera Tiger</h2>
            <p>GUI Arrera Tiger est le nom de code du projet Arrera Store.</p>
            <div class="service-links">
                <a href="https://github.com/Arrera-Software/arrera-tiger" class="learn-more">Code source</a>
            </div>
        </div>

        <div class="service-card">
            <h2>Arrera Tiger Objet</h2>
            <p>Arrera Tiger est le composant central d'Arrera Store, qui permet d'installer, de désinstaller et de mettre à jour vos applications Arrera.</p>
            <div class="service-links">
                <a href="https://github.com/Arrera-Software/Arrera-Tiger-objet" class="learn-more">Code source</a>
            </div>
        </div>

        <div class="service-card">
            <h2>Arrera Tiger Demon</h2>
            <p>Arrera Tiger Demon est le composant présent dans tous les logiciels développés par Arrera, qui permet de vous indiquer si votre logiciel est à jour</p>
            <div class="service-links">
                <a href="https://github.com/Arrera-Software/tiger-demon" class="learn-more">Code source</a>
            </div>
        </div>

        <div class="service-card">
            <h2>Arrera Tiger Updater</h2>
            <p>Arrera Tiger Updater est le programme qui permet d'effectuer l'installation d'Arrera Store</p>
            <div class="service-links">
                <a href="https://github.com/Arrera-Software/arrera-tiger-updater" class="learn-more">Code source</a>
            </div>
        </div>

        <div class="service-card">
            <h2>Fichier de depots</h2>
            <p>Fichier JSON hébergé sur le site d'Arrera, qui permet aux deux autres composants de faire leur travail</p>
            <div class="service-links">
                <a href="https://arrera-software.fr/depots.json" class="learn-more">Fichier</a>
            </div>
        </div>
    </main>


    <?php include 'header-footer/footer.php'; ?>

</body>