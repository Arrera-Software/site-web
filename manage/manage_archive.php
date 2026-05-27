<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

// Protection basique : l'utilisateur doit être connecté
if (!isset($_SESSION['identifiant'])) {
    header('Location: ../connexion.php');
    exit();
}

// Vérifier et inclure la configuration (PDO)
$configFile = __DIR__ . '/../config.php';
if (!file_exists($configFile)) {
    die('Fichier de configuration introuvable : ' . $configFile);
}
require_once $configFile;

try {
    $sql = 'SELECT id, titre, editeur, date_creation, pj_image FROM archive ORDER BY date_creation DESC';
    $stmt = $pdo->query($sql);
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('Erreur SQL : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des articles</title>
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/manage_article.css">
    <link rel="icon" href="/img/logo-arrera.webp">
    <style>
        
    </style>
</head>

<body>
    <?php include '../header-footer/header.php'; ?>

    <main>
        <h1>Gestion des articles</h1>

        <?php if (!empty($errorMsg)) : ?>
            <div style="color: red; margin-bottom: 12px;"><?php echo htmlspecialchars($errorMsg); ?></div>
        <?php endif; ?>

        <?php if (isset($_GET['archived'])): ?>
            <div style="color: green; margin-bottom:12px;">Article archivé avec succès.</div>
        <?php elseif (isset($_GET['deleted'])): ?>
            <div style="color: green; margin-bottom:12px;">Article supprimé avec succès.</div>
        <?php endif; ?>

        <?php if (count($articles) === 0): ?>
            <p>Aucun article publié.</p>
        <?php else: ?>
            <table class="manage-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Éditeur</th>
                        <th>Date</th>
                        <th>Aperçu image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $a): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($a['id']); ?></td>
                            <td><?php echo htmlspecialchars($a['titre']); ?></td>
                            <td><?php echo htmlspecialchars($a['editeur']); ?></td>
                            <td><?php echo htmlspecialchars($a['date_creation']); ?></td>
                            <td>
                                <?php if (!empty($a['pj_image'])): ?>
                                    <img src="<?php echo "/" . htmlspecialchars($a['pj_image']); ?>" alt="IMAGE ARTICLE" style="max-height:50px;">
                                <?php else: ?>
                                    —
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="actions">
                                    <!-- Restaurer depuis l'archive -->
                                    <form method="post" action="/scripts/restore_archive.php" style="display:inline;" onsubmit="return confirm('Restaurer cet article ?');">
                                        <input type="hidden" name="archive_id" value="<?php echo htmlspecialchars($a['id']); ?>">
                                        <button type="submit" class="btn btn-create">Réactiver</button>
                                    </form>
                                    <!-- Suppression définitive : formulaire POST vers scripts/delete_archive.php -->
                                    <form method="post" action="/scripts/delete_archive.php" style="display:inline;" onsubmit="return confirm('Supprimer définitivement cet article ? Cette action est irréversible.');">
                                        <input type="hidden" name="archive_id" value="<?php echo htmlspecialchars($a['id']); ?>">
                                        <button type="submit" class="btn btn-del">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <div>
            <a href="manage_article.php" class="btn btn-archive">Gestion des article</a>
        </div>
    </main>

    <?php include '../header-footer/footer.php'; ?>

</body>

</html>