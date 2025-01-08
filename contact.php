<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/contact.css">
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
                    <a href="" class="header-link">Contact</a>
                    <a href="interface" class="header-link">Interface</a>
                    <a href="a-propos" class="header-link">A propos</a>

                </div>
            </div>
        </div>
    </header>

    <main class="contact-container">
        <div class="contact-form-wrapper">
            <h1>Contactez-nous</h1>
            <form class="contact-form" method="POST" action="scripts/email.php">
                <div class="form-group">
                    <input type="text" id="name" name="name" required>
                    <label for="name">Nom</label>
                </div>

                <div class="form-group">
                    <input type="text" id="prenom" name="prenom" required>
                    <label for="prenom">Prénom</label>
                </div>
                
                <div class="form-group">
                    <input type="email" id="email" name="email" required>
                    <label for="email">Email</label>
                </div>
                
                <div class="form-group">
                    <input type="text" id="subject" name="subject" required>
                    <label for="subject">Sujet</label>
                </div>
                
                <div class="form-group">
                    <textarea id="message" name="message" required></textarea>
                    <label for="message">Message</label>
                </div>
                
        
                
                <button type="submit" class="submit-btn">Envoyer</button>
            </form>
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
