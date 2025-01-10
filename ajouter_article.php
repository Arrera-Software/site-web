<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['identifiant'])) {
    header("Location: articles.php?error=1");
    exit();
}

// Vérifier si le fichier config.php existe
$configFile = __DIR__ . '/config.php';
if (!file_exists($configFile)) {
    die("Le fichier config.php n'existe pas dans : " . $configFile);
}

// Inclure le fichier de configuration
require_once $configFile;

// Afficher les erreurs pour le débogage
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $titre = $_POST['titre'] ?? null;
    $contenu = $_POST['contenu'] ?? null;
    $pj_image = $_FILES['pj_image'] ?? null;

    // Validation des données
    if (empty($titre) || empty($contenu)) {
        header("Location: articles.php?error=1");
        exit();
    }

    // Traitement de l'image (si nécessaire)
    $imagePath = null;
    if ($pj_image && $pj_image['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/'; // Répertoire de destination
        
        // Créer le répertoire s'il n'existe pas
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        // Générer un nom de fichier unique
        $extension = pathinfo($pj_image['name'], PATHINFO_EXTENSION);
        $uniqueName = uniqid() . '.' . $extension;
        $imagePath = $uploadDir . $uniqueName;

        // Vérifier le type de fichier
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (!in_array($pj_image['type'], $allowedTypes)) {
            header("Location: articles.php?error=1");
            exit();
        }

        if (!move_uploaded_file($pj_image['tmp_name'], $imagePath)) {
            header("Location: articles.php?error=1");
            exit();
        }
    }

    try {
        // Requête SQL simplifiée
        $sql = "INSERT INTO articles (titre, contenu, pj_image) 
                VALUES (:titre, :contenu, :pj_image)";
        $stmt = $pdo->prepare($sql);
        
        // Lier les paramètres
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->bindParam(':pj_image', $imagePath);

        // Ajouter du débogage
        if (!$stmt->execute()) {
            $error = $stmt->errorInfo();
            die("Erreur SQL : " . print_r($error, true));
        }
        
        header("Location: articles.php?success=1");
        exit();
        
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
} else {
    header("Location: articles.php?error=1");
    exit();
}
?>