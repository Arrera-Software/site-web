<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Vérifier la connexion
if (!isset($_SESSION['identifiant'])) {
    header('Location: ../connexion.php');
    exit();
}

// Charger config
$configFile = __DIR__ . '/../config.php';
if (!file_exists($configFile)) {
    die('Fichier de configuration introuvable : ' . $configFile);
}
require_once $configFile;

// Récupérer l'ID
$id = isset($_GET['id']) ? intval($_GET['id']) : (isset($_POST['id']) ? intval($_POST['id']) : 0);
if ($id <= 0) {
    die('ID article invalide.');
}

// Traitement POST (mise à jour)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'] ?? '';
    $contenu = $_POST['contenu'] ?? '';

    if (empty($titre) || empty($contenu)) {
        $error = 'Le titre et le contenu sont requis.';
    } else {
        // Gestion de l'image
        $pj_image = null;
        if (isset($_FILES['pj_image']) && $_FILES['pj_image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../uploads/';
            if (!file_exists($uploadDir)) mkdir($uploadDir, 0777, true);
            $ext = pathinfo($_FILES['pj_image']['name'], PATHINFO_EXTENSION);
            $fileName = uniqid() . '.' . $ext;
            $dest = $uploadDir . $fileName;
            if (!move_uploaded_file($_FILES['pj_image']['tmp_name'], $dest)) {
                $error = 'Erreur lors de l upload de l image.';
            } else {
                // chemin relatif pour stockage
                $pj_image = 'uploads/' . $fileName;
            }
        }

        try {
            if ($pj_image) {
                $sql = 'UPDATE articles SET titre = :titre, contenu = :contenu, pj_image = :pj_image WHERE id = :id';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':pj_image', $pj_image);
            } else {
                $sql = 'UPDATE articles SET titre = :titre, contenu = :contenu WHERE id = :id';
                $stmt = $pdo->prepare($sql);
            }
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':contenu', $contenu);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            header('Location: manage_article.php?updated=1');
            exit();
        } catch (PDOException $e) {
            $error = 'Erreur SQL : ' . $e->getMessage();
        }
    }
}

// Récupérer article courant
try {
    $stmt = $pdo->prepare('SELECT id, titre, contenu, pj_image FROM articles WHERE id = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $article = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$article) {
        die('Article introuvable.');
    }
} catch (PDOException $e) {
    die('Erreur SQL : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier l'article</title>
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="icon" href="/img/logo-arrera.webp">
    <link rel="stylesheet" href="/css/edit_article.css">
</head>
<body>
    <?php include __DIR__ . '/../header-footer/header.php'; ?>

    <main style="padding:20px;">
        <h1>Modifier l'article</h1>

        <?php if (!empty($error)): ?>
            <div style="color:red"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($article['id']); ?>">
            <h2>Titre</h2>
            <input type="text" name="titre" class="input-title" value="<?php echo htmlspecialchars($article['titre']); ?>" required>

            <h2>Contenu</h2>
            <textarea name="contenu" rows="12" required><?php echo htmlspecialchars($article['contenu']); ?></textarea>

            <h2>Image actuelle</h2>
            <?php if (!empty($article['pj_image'])): ?>
                <div><img src="<?php echo "/" . htmlspecialchars($article['pj_image']); ?>" alt="image" style="max-width:200px;"></div>
            <?php else: ?>
                <div>Aucune image</div>
            <?php endif; ?>

            <h2>Remplacer l'image (optionnel)</h2>
            <input type="file" name="pj_image" accept="image/*">

            <div>
                <button class="btn btn-save" type="submit">Enregistrer</button>
                <a class="btn btn-back" href="manage_article.php" style="margin-left:8px;">Retour</a>
            </div>
        </form>
    </main>

    <?php include __DIR__ . '/../header-footer/footer.php'; ?>
</body>
</html>
