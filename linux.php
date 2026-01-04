<?php
    session_start();

// Débogage des erreurs
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Vérification du fichier .env
$envFile = __DIR__ . '/.env';
if (!file_exists($envFile)) {
    error_log("Fichier .env introuvable dans : " . $envFile);
} else {
    $config = parse_ini_file($envFile);
    error_log("Configuration SMTP trouvée : " . (isset($config['SMTP_PASSWORD']) ? 'Oui' : 'Non'));
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrera Linux</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/linux.css">
    <link rel="icon" href="img/arrera-linux.webp">
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
    <main>
        <img src="img/baniere2026-linux.webp" alt="Logo Linux" class="logo-linux">
    </main>
    <?php include 'header-footer/footer.php'; ?>
</body>
</html>