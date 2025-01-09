<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/articles.css">
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
                <a href="articles" class="header-link">Articles</a>
                <a href="contact" class="header-link">Contact</a>
                <a href="a-propos" class="header-link">À propos</a>
            </div>
        </div>
    </div>
</header>

<?php

// Charger les variables d'environnement à partir du fichier .env
require 'vendor/autoload.php'; // Assurez-vous que le chemin vers le fichier autoload est correct
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__); // Crée une instance de Dotenv pour charger les variables d'environnement
$dotenv->load(); // Charge les variables d'environnement

// Connexion à la base de données avec les informations d'identification stockées dans les variables d'environnement
$conn = new pdo($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']); // Crée une nouvelle connexion PDO

// Vérification de la connexion à la base de données
if ($conn->connect_error) { // Si une erreur de connexion se produit
    die("Échec de la connexion: " . $conn->connect_error); // Affiche un message d'erreur et arrête l'exécution
}

// Requête SQL pour récupérer les articles de la base de données
$sql = "SELECT titre, contenu, image FROM articles"; // Déclare la requête SQL
$result = $conn->query($sql); // Exécute la requête et stocke le résultat

// Affichage des articles récupérés
if ($result->num_rows > 0) { // Vérifie s'il y a des articles dans le résultat
    while($row = $result->fetch_assoc()) { // Parcourt chaque ligne du résultat
        echo '<div class="article-card">'; // Ouvre une nouvelle carte d'article
        echo '<h2>' . htmlspecialchars($row['titre']) . '</h2>'; // Affiche le titre de l'article en échappant les caractères spéciaux
        echo '<img src="' . htmlspecialchars($row['image']) . '" alt="Image de l\'article">'; // Affiche l'image de l'article
        echo '<p>' . htmlspecialchars($row['contenu']) . '</p>'; // Affiche le contenu de l'article en échappant les caractères spéciaux
        echo '</div>'; // Ferme la carte d'article
    }
} else {
    echo "Aucun article trouvé."; // Affiche un message si aucun article n'est trouvé
}

// Fermeture de la connexion à la base de données
$conn->close(); // Ferme la connexion PDO
?>

<main class="container-articles">
    <!-- Les articles seront affichés ici -->
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
