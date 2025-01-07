<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A propos</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/a-propos.css">
    
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
                    <a href="" class="header-link">A propos</a>

                </div>
            </div>
        </div>
    </header>

    <main class="histoire-section">
        <img src="img/arrera-software.webp" alt="Arrera Software Logo" class="histoire-logo">
        <h1 class="histoire-title">Petit Histoire d'Arrera</h1><br><br>
        <p class="histoire-text">
            Arrera Software est une organisation de logiciels open source fondée par Baptiste P qui a commencé par créer un premier assistant nommé SIX en 2021. <br><br>
            Aujourd'hui, Arrera Software maintient trois assistants et une application lourde.
        </p>
        <hr class="separator">
        
        <h1 class="team-title" style="text-decoration: underline;">L'équipe Arrera-Software</h1>
        <div class="team-container">
            <div class="team-member">
                <a href="https://github.com/baptistepau" target="_blank">
                    <img src="img/baptiste.webp" alt="Baptiste P" class="member-img">
                </a>
                <h3>Baptiste P</h3>
                <p>Fondateur</p>
            </div>
            <div class="team-member">
                <a href="https://github.com/skoyzz" target="_blank">
                    <img src="img/skoyzz.webp" alt="Quentin B" class="member-img">
                </a>
                <h3>Quentin B</h3>
                <p>Developpeur Web</p>
            </div>
            <div class="team-member">
                <img src="img/charlotte.webp" alt="Charlotte B" class="member-img">
                <h3>Charlotte B</h3>
                <p>Correctrice</p>
            </div>
            <div class="team-member">
                <img src="img/arnaud.webp" alt="Arnaud F" class="member-img">
                <h3>Arnaud F</h3>
                <p>Correcteur</p>
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
