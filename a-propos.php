<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A propos</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/a-propos.css">
    <link rel="icon" href="img/logo-arrera.webp">
</head>
<body>
    <?php include 'header-footer/header.php'; ?>

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

    <?php include 'header-footer/footer.php'; ?>

</body>
</html>
