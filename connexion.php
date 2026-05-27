<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/connexion.css">
    <link rel="icon" href="/img/logo-arrera.webp">
</head>
<body>
    <?php include 'header-footer/header.php'; ?>

    <main class="login-container">
        <div class="login-form-wrapper">
            <h1>Espace membre</h1>
            <form class="login-form" action="scripts/login.php" method="POST">
                <div class="form-group">
                    <input type="text" id="identifiant" name="identifiant" placeholder=" " required>
                    <label for="text">Identifiant</label>
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
                
            </form>
        </div>
    </main>

    <?php include 'header-footer/footer.php'; ?>

</body>
</html>
