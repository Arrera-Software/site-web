<?php
    session_start();
    // Afficher les erreurs pour le débogage
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
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

// Vérifier si le fichier config.php existe
$configFile = __DIR__ . '/config.php';
if (!file_exists($configFile)) {
    die("Le fichier config.php n'existe pas dans : " . $configFile);
}

// Inclure le fichier de configuration
require_once $configFile;

// Vérifier si $pdo est défini
if (!isset($pdo)) {
    die("La connexion PDO n'a pas été établie correctement");
}

// Requête SQL pour récupérer les articles de la base de données
$sql = "SELECT titre, contenu, pj_image FROM articles"; // Déclare la requête SQL
try {
    $result = $pdo->query($sql); // Exécute la requête et stocke le résultat
} catch (PDOException $e) {
    die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
}

// Affichage des articles récupérés
if ($result->rowCount() > 0) { // Vérifie s'il y a des articles dans le résultat
    while($row = $result->fetch(PDO::FETCH_ASSOC)) { // Parcourt chaque ligne du résultat
        echo '<div class="article-card" onclick="openPopup(\'' . htmlspecialchars($row['contenu']) . '\')">'; // Ouvre une nouvelle carte d'article avec un événement onclick
        echo '<h2>' . htmlspecialchars($row['titre']) . '</h2>'; // Affiche le titre de l'article
        echo '<img src="' . htmlspecialchars($row['pj_image']) . '" alt="Image de l\'article">'; // Affiche l'image de l'article
        echo '</div>'; // Ferme la carte d'article
    }
} else {
    echo "Aucun article trouvé."; // Affiche un message si aucun article n'est trouvé
}

// Ajout de la popup pour afficher le contenu complet de l'article
echo '<div id="popup" class="popup" style="display:none;">'; // Crée une div pour la popup
echo '<span class="close" onclick="closePopup()">&times;</span>'; // Bouton de fermeture
echo '<div id="popup-content"></div>'; // Contenu de la popup
echo '</div>'; // Ferme la div de la popup

// Fermeture de la connexion à la base de données
$pdo = null; // Ferme la connexion PDO
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

<script>
function openPopup(content) {
    document.getElementById("popup-content").innerHTML = content; // Met à jour le contenu de la popup
    document.getElementById("popup").style.display = "block"; // Affiche la popup
}

function closePopup() {
    document.getElementById("popup").style.display = "none"; // Cache la popup
}
</script>

</body>
</html>
