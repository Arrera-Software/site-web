<?php

// Charger les variables d'environnement depuis le fichier .env
$envFile = __DIR__ . '/.env'; // Définir le chemin du fichier .env
if (file_exists($envFile)) { // Vérifier si le fichier .env existe
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); // Lire les lignes du fichier .env
    foreach ($lines as $line) { // Parcourir chaque ligne
        // Vérifier si la ligne contient un '=' et n'est pas un commentaire
        if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
            list($key, $value) = explode('=', $line, 2); // Séparer la clé et la valeur
            $_ENV[trim($key)] = trim($value); // Stocker la valeur dans la variable d'environnement
        }
    }
}

try {
    // Établir une connexion PDO à la base de données
    $pdo = new PDO(
        "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset=utf8", // DSN de la base de données
        $_ENV['DB_USER'], // Utilisateur de la base de données
        $_ENV['DB_PASS'], // Mot de passe de la base de données
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Activer le mode d'erreur
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Définir le mode de récupération par défaut
        ]
    );
} catch (PDOException $e) { // Gérer les exceptions de connexion
    die("Erreur de connexion : " . $e->getMessage()); // Afficher un message d'erreur
}
?>