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
                    <a href="assitant" class="header-link">Assistant</a>
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
                            echo '<a href="scripts/deconnexion">Se déconnecter</a>';
                            echo '</div>';
                            echo '</div>';
                        } 
                        else {
                                null;           
                        }
                    ?>
                </div>
            </div>
        </div>
    </header>

    <div class="container-g">
        <div class="text-section">
            <h1>Arrera Store</h1>
            <p>Magasin d'applications d'Arrera qui permet d'installer, de mettre à jour et de désinstaller toutes les applications Arrera.</p>
        </div>
        <section class="image-section">
            <img src="img/arrera-tiger.webp" alt="Arrera Interface I2024" class="img">
        </section>
        <p class="download-interface">Sort bientôt</p>
        <!--<a href="" class="download-interface">Télécharger le setup</a>-->
    </div>

    <div class="title-session">
        <h1>Composant de l'Arrera Store</h1>
    </div>

    <main class="services-container">
        <div class="service-card">
            <h2>Arrera Tiger</h2>
            <p>Arrera Tiger est le composant central d'Arrera Store, qui permet d'installer, de désinstaller et de mettre à jour vos applications Arrera.</p>
            <div class="service-links">
                <a href="" class="learn-more">Code source</a>
            </div>
        </div>

        <div class="service-card">
            <h2>Arrera Tiger Demon</h2>
            <p>Arrera Tiger Demon est le composant présent dans tous les logiciels développés par Arrera, qui permet de vous indiquer si votre logiciel est à jour</p>
            <div class="service-links">
                <a href="" class="learn-more">Code source</a>
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
</body>