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
    $sql = 'SELECT id_btn,name_btn FROM btn';
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
    <link rel="stylesheet" href="/css/manage_btn.css">
    <link rel="icon" href="/img/logo-arrera.webp">
</head>
<body>
    <?php include '../header-footer/header.php'; ?>



    <main class="container">
        <h1>Gestion des boutons</h1>

        <section class="table-panel">
            <?php if (empty($articles)) : ?>
                <p>Aucun bouton trouvé.</p>
            <?php else : ?>
                <table class="manage-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom du bouton</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($articles as $btn) : ?>
                            <tr>
                                <td><?= htmlspecialchars($btn['id_btn']) ?></td>
                                <td><?= htmlspecialchars($btn['name_btn']) ?></td>
                                <td>
                                    <!-- Lien vers la page de modification (à créer si nécessaire) -->
                                    <a class="btn edit" href="edit_btn.php?id=<?= urlencode($btn['id_btn']) ?>">Modifier</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </section>
    </main>

    <?php include '../header-footer/footer.php'; ?>
</body>
</html>