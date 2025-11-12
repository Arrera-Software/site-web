<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['identifiant'])) {
    header("Location: articles.php?error=1");
    exit();
}

// Vérifier si le fichier config.php existe (un niveau au-dessus du dossier scripts)
$configFile = __DIR__ . '/../config.php';
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
    $image_choice = $_POST['image_choice'] ?? 'none';
    $existing_image = $_POST['existing_image'] ?? '';

    // Validation des données
    if (empty($titre) || empty($contenu)) {
        header("Location: articles.php?error=1");
        exit();
    }

    // Traitement de l'image selon le choix : none / existing / upload
    $imagePath = null;
    if ($image_choice === 'existing' && !empty($existing_image)) {
        // On utilise le chemin fourni (ex: img/nom.jpg ou uploads/nom.jpg)
        $imagePath = $existing_image;
    } elseif ($image_choice === 'upload' && $pj_image && $pj_image['error'] === UPLOAD_ERR_OK) {
        // Uploader le fichier dans /uploads
        $uploadDirFs = __DIR__ . '/../uploads/'; // chemin filesystem
        $uploadDirWeb = 'uploads/'; // chemin à stocker en base

        // Créer le répertoire s'il n'existe pas
        if (!file_exists($uploadDirFs)) {
            mkdir($uploadDirFs, 0777, true);
        }

        // Vérifier le type de fichier
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $pj_image['tmp_name']);
        finfo_close($finfo);
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (!in_array($mime, $allowedTypes)) {
            header("Location: /manage/add_article.php?error=invalid_image");
            exit();
        }

        // Générer un nom de fichier unique
        $extension = pathinfo($pj_image['name'], PATHINFO_EXTENSION);
        $uniqueName = uniqid() . '.' . $extension;
        $destFs = $uploadDirFs . $uniqueName;

        if (!move_uploaded_file($pj_image['tmp_name'], $destFs)) {
            header("Location: /manage/add_article.php?error=upload_failed");
            exit();
        }

        $imagePath = $uploadDirWeb . $uniqueName;
    }

    try {
    // Requête SQL simplifiée
    $sql = "INSERT INTO articles (titre, contenu, pj_image, date_creation, editeur) 
        VALUES (:titre, :contenu, :pj_image, :date_creation, :editeur)";
    $stmt = $pdo->prepare($sql);
        
        $editeur = $_SESSION['identifiant']; // valeur par défaut
        try {
            $uStmt = $pdo->prepare('SELECT name FROM user WHERE identifiant = :ident');
            $uStmt->bindParam(':ident', $_SESSION['identifiant']);
            $uStmt->execute();
            $uRow = $uStmt->fetch(PDO::FETCH_ASSOC);
            if ($uRow && !empty($uRow['name'])) {
                $editeur = $uRow['name'];
            }
        } catch (PDOException $e) {
            // Si erreur, on conserve l'identifiant en tant qu'éditeur
            // (ne pas échouer l'insertion à cause d'un souci de lecture du nom)
        }
        $date_creation = date('Y-m-d H:i:s'); // Date actuelle

    // Lier les paramètres
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':contenu', $contenu);
    $stmt->bindParam(':pj_image', $imagePath);
    $stmt->bindParam(':date_creation', $date_creation); // Lier la date de création
    $stmt->bindParam(':editeur', $editeur); // Lier l'éditeur

        // Ajouter du débogage
        if (!$stmt->execute()) {
            $error = $stmt->errorInfo();
            die("Erreur SQL : " . print_r($error, true));
        }
        
    // Rediriger vers la gestion des articles
    header("Location: /manage/manage_article.php?success=1");
    exit();
        
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
} else {
    header("Location: articles.php?error=1");
    exit();
}
?>