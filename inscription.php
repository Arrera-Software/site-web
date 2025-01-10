<?php
    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') { // Vérifier si le rôle est 'admin'
        header("Location: ../index"); // Rediriger vers la page d'accueil si le rôle ne correspond pas
        exit();
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/inscription.css">

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
                    <a href="contact" class="header-link">Contact</a>
                    <a href="a-propos" class="header-link">À propos</a>
                </div>
            </div>
        </div>
    </header>

    <main class="login-container">
        <div class="login-form-wrapper">
            <h1>Inscription de membre</h1>
            <form class="login-form" action="scripts/inscription.php" method="POST">
                <div class="form-group">
                    <input type="text" id="identifiant" name="identifiant" placeholder=" " required>
                    <label for="identifiant">Identifiant</label>
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
                    const password2 = document.querySelector('#password2');
                    const form = document.querySelector('.login-form');
                    
                    togglePassword.addEventListener('click', function (e) {
                        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                        password.setAttribute('type', type);
                        this.textContent = type === 'password' ? '👁️' : '👁️‍🗨️';
                    });

                    // Vérification des mots de passe
                    form.addEventListener('submit', function(e) {
                        if (password.value !== password2.value) {
                            e.preventDefault();
                            alert('Les mots de passe ne correspondent pas !');
                        }
                    });
                </script>

                <div class="form-group">
                    <div style="position: relative;">
                        <input type="password" id="password2" name="password2" placeholder=" " required>
                        <label for="password2">Confirmer le mot de passe</label>
                        <button type="button" id="togglePassword2" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer;">
                            👁️
                        </button>
                    </div>
                </div>
                <script>
                    const togglePassword2 = document.querySelector('#togglePassword2');
                    
                    togglePassword2.addEventListener('click', function (e) {
                        const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
                        password2.setAttribute('type', type);
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
