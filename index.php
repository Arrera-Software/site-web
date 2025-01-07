<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/index.css">

</head>
<body>
    
<audio id="audio" src="img/logopng.mp3" style="display:none;" autoplay loop></audio>
<script>
  // Réglez le volume une fois que l'audio est chargé
  document.addEventListener('DOMContentLoaded', () => {
    const audio = document.getElementById('audio');
    audio.volume = 0.5; // Régler le volume à 50%
    audio.play().catch(error => {
      console.warn("L'audio ne peut pas être lu automatiquement à cause des restrictions du navigateur. L'utilisateur doit interagir avec la page.");
    });
  });
</script>
    <!-- Header principal -->
    <header class="main-header">
        <div class="container">
            <div class="header-content">
                <!-- Logo -->
                <div class="logo">
                    <a href="">
                        <img src="img/file.webp" alt="Logo" class="logo-img">
                    </a>
                </div>
                <!-- Navigation -->
                <div class="header-links">
                    <a href="" class="header-link">Accueil</a>
                    <a href="assitant" class="header-link">Assistant</a>
                    <a href="interface" class="header-link">Interface</a>
                    <a href="contact" class="header-link">Contact</a>
                    <a href="a-propos" class="header-link">A propos</a>

                </div>
            </div>
        </div>
    </header>

    <!-- Section de présentation style Apple -->
    <section class="hero-section dark-theme">
        <div class="container-accueil">
            <h1 class="title">Arrera Software<br></h1>
            <h2 class="texte">Une organisation de développement de logiciels open-source spécialisée dans les assistants personnels.</h2>
        </div>
    </section>

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
