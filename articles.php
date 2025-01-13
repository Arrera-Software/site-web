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
                    <?php
                        if (isset($_SESSION['identifiant'])) {
                            echo '<div class="header-link-connexion">';
                            echo 'Bonjour, ' . htmlspecialchars($_SESSION['identifiant']);
                            echo '<div class="dropdown-menu">';
                            echo '<a href="#" onclick="openAddArticlePopup()">Ajouter un article</a>';
                            echo '<a href="scripts/deconnexion">Se déconnecter</a>';
                            echo '</div>';
                            echo '</div>';
                        } 
                        else {
                            echo null;           
                        }
                    ?>
                    
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
$sql = "SELECT titre, contenu, pj_image, date_creation, editeur FROM articles"; // Déclare la requête SQL
try {
    $result = $pdo->query($sql); // Exécute la requête et stocke le résultat
} catch (PDOException $e) {
    die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
}

// Déplacer cette partie à l'intérieur de la balise main
echo '<main class="container-articles">';
if ($result->rowCount() > 0) {
    echo '<div class="container-articles">';
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        // Échapper les caractères spéciaux pour JavaScript
        $content = str_replace(array("\r", "\n"), '', addslashes(htmlspecialchars($row['contenu'])));
        $title = str_replace(array("\r", "\n"), '', addslashes(htmlspecialchars($row['titre'])));
        $image = !empty($row['pj_image']) ? str_replace(array("\r", "\n"), '', addslashes(htmlspecialchars($row['pj_image']))) : '';
        
        echo '<div class="article-card" onclick="openPopup(\'' . $content . '\', \'' . $title . '\', \'' . $image . '\')">';
        if (!empty($row['pj_image'])) {
            echo '<img src="' . htmlspecialchars($row['pj_image']) . '" alt="Image de l\'article" class="article-image">';
        }
        echo '<h2>' . htmlspecialchars($row['titre']) . '</h2>';
        echo '<p>' . htmlspecialchars(substr($row['contenu'], 0, 150)) . '...</p>';
        echo '<p><img src="img/calendar.png" alt="Calendrier" class="img"> Date  : ' . htmlspecialchars($row['date_creation']) . '</p>';
        echo '<p><img src="img/copy-writing.png" alt="Editeur" class="img"> Éditeur : ' . htmlspecialchars($row['editeur']) . '</p>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo "Aucun article trouvé.";
}
echo '</main>';

// Garder la popup en dehors du main
echo '<div id="popup" class="popup" style="display:none;">';
echo '<span class="close" onclick="closePopup()">&times;</span>'; // Bouton de fermeture
echo '<div id="popup-content" class="popup-content">';
echo '<div id="popup-image"></div>'; // Nouvel élément pour l'image
echo '<div id="popup-text"></div>'; // Élément pour le texte
echo '</div>';
echo '</div>'; // Ferme la div de la popup

// Ajout du popup pour créer un article
if (isset($_SESSION['identifiant'])) {
    echo '<div id="add-article-popup" class="popup" style="display:none;">';
    echo '<span class="close" onclick="closeAddArticlePopup()">&times;</span>'; // Bouton de fermeture    
    echo '<div class="popup-content">';
    echo '<h2>Ajouter un article</h2>';
    echo '<form action="ajouter_article.php" method="POST" enctype="multipart/form-data">';
    echo '<input type="text" name="titre" placeholder="Titre de l\'article" required><br><br>';
    echo '<textarea name="contenu" placeholder="Contenu de l\'article" required style="height: 500px; resize: none;"></textarea>';
    echo '<input type="file" name="pj_image" accept="image/*"><br><br>';
    echo '<button type="submit">Publier l\'article</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
}

// Par une div pour le toast
echo '<div id="toast" class="toast"></div>';

// Fermeture de la connexion à la base de données
$pdo = null; // Ferme la connexion PDO
?>

    <!-- NE PAS SUPPRIMER  !!! -->

    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <p class="copyright">
                © <?php echo date('Y'); ?> Arrera-Software | Tous droits réservés
            </p>
        </div>
    </footer>

    <script>
    function openPopup(content, title, image) {
        const popupContent = document.getElementById("popup-content");
        const popupImage = document.getElementById("popup-image");
        const popupText = document.getElementById("popup-text");
        
        // Ajouter l'image si elle existe
        if (image) {
            popupImage.innerHTML = `<img src="${image}" alt="Image de l'article" class="popup-image">`;
        } else {
            popupImage.innerHTML = '';
        }
        
        // Ajouter le titre et le contenu en décodant les caractères HTML
        const decodedTitle = title.replace(/\\'/g, "'");
        const decodedContent = content.replace(/\\'/g, "'");
        popupText.innerHTML = `<h2>Titre : ${decodedTitle}</h2><br><br>${decodedContent}`;
        document.getElementById("popup").style.display = "flex";
    }

    function closePopup() {
        const popup = document.getElementById("popup");
        if (popup) {
            popup.style.display = "none"; // Ferme la popup
        }
    }

    function openAddArticlePopup() {
        document.getElementById("add-article-popup").style.display = "flex"; // Ouvre la popup
    }

    function closeAddArticlePopup() {
        document.getElementById("add-article-popup").style.display = "none"; // Ferme la popup
    }

    function handleSelectChange(value) {
        if (value === 'add') {
            openAddArticlePopup();
        } else if (value === 'logout') {
            window.location.href = 'scripts/deconnexion';
        }
    }

    function showToast(message, type) {
        const toast = document.getElementById('toast');
        toast.textContent = message;
        toast.className = 'toast ' + type; // success ou error
        toast.classList.add('show');
        
        setTimeout(() => {
            toast.classList.remove('show');
        }, 3000); // Le toast disparaît après 3 secondes
    }

    // Vérifier les paramètres d'URL au chargement de la page
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('success') === '1') {
            showToast('Article ajouté avec succès !', 'success');
        } else if (urlParams.get('error') === '1') {
            showToast('Erreur lors de l\'ajout de l\'article.', 'error');
        }
    });
    </script>


</body>

</html>