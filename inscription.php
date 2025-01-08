<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/connexion.css">

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
                    <a href="services" class="header-link">Assistant</a>
                    <a href="contact" class="header-link">Contact</a>
                    <a href="a-propos" class="header-link">A propos</a>

                </div>
            </div>
        </div>
    </header>

    <main class="login-container">
        <div class="login-form-wrapper">
            <h1>Inscription de membre</h1>
            <form class="login-form" action="scripts/login.php" method="POST">
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder=" " required>
                    <label for="email">Adresse email</label>
                </div>
                
                <div class="form-group">
                    <div style="position: relative;">
                        <input type="password" id="password" name="password" placeholder=" " required>
                        <label for="password">Mot de passe</label>
                        <button type="button" id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer;">
                            👁️
                        </button>
                    </div>
                </div>
                <script>
                    const togglePassword = document.querySelector('#togglePassword');
                    const password = document.querySelector('#password');
                    
                    togglePassword.addEventListener('click', function (e) {
                        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                        password.setAttribute('type', type);
                        this.textContent = type === 'password' ? '👁️' : '👁️‍🗨️';
                    });
                </script>
                
                <button type="submit" class="login-btn">Se connecter</button>
                
                <div class="forgot-password">
                    <a href="scripts/mdp-oublie">Mot de passe oublié ?</a>
                </div>
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
