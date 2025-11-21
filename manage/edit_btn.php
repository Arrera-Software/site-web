<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

// Protection basique : l'utilisateur doit être connecté
if (!isset($_SESSION['identifiant'])) {
    header('Location: ../connexion.php');
    exit();
}

// include config PDO
$configFile = __DIR__ . '/../config.php';
if (!file_exists($configFile)) {
    die('Fichier de configuration introuvable : ' . $configFile);
}
require_once $configFile;

// Vérifier l'ID
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
    header('Location: manage_btn.php');
    exit();
}

// Récupérer les données actuelles
try {
    $sql = 'SELECT * FROM btn WHERE id_btn = :id LIMIT 1';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $btn = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$btn) {
        header('Location: manage_btn.php');
        exit();
    }
} catch (PDOException $e) {
    die('Erreur SQL : ' . $e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Modifier le bouton<?= isset($btn['name_btn']) ? ' — ' . htmlspecialchars($btn['name_btn']) : '' ?></title>
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/manage_btn.css">
    <link rel="stylesheet" href="/css/edit_btn.css">
    <link rel="icon" href="/img/logo-arrera.webp">
</head>
<body>
    <?php include __DIR__ . '/../header-footer/header.php'; ?>

    <main>
    <h1>Modifier le bouton<?= isset($btn['name_btn']) ? ' : ' . htmlspecialchars($btn['name_btn']) : '' ?></h1>

        <?php
        // Afficher d'éventuelles erreurs passées en param GET (redirigé par le script)
        if (!empty($_GET['error'])) {
            // limiter la longueur pour éviter d'injecter de très longues chaînes via l'URL
            $error = substr($_GET['error'], 0, 1000);
        }

        ?>

        <form method="post" action="/scripts/script_editbtn.php">
            <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
            <div class="form-row">
                <label for="name_btn">Nom du bouton <strong><?= htmlspecialchars($btn['name_btn'] ?? '') ?></strong></label>
            </div>

            <fieldset class="links-fieldset">
                <legend>Liens</legend>
                <div class="form-row">
                    <label for="link_default">Lien par défaut</label>
                    <input type="text" id="link_default" name="link_default" class="text-input" value="<?= htmlspecialchars($btn['link_default'] ?? '') ?>">
                </div>
                <div class="form-row">
                    <label for="link_win">Lien Windows</label>
                    <input type="text" id="link_win" name="link_win" class="text-input" value="<?= htmlspecialchars($btn['link_win'] ?? '') ?>">
                </div>
                <div class="form-row">
                    <label for="link_mac">Lien Mac</label>
                    <input type="text" id="link_mac" name="link_mac" class="text-input" value="<?= htmlspecialchars($btn['link_mac'] ?? '') ?>">
                </div>
                <div class="form-row">
                    <label for="link_linux">Lien Linux</label>
                    <input type="text" id="link_linux" name="link_linux" class="text-input" value="<?= htmlspecialchars($btn['link_linux'] ?? '') ?>">
                </div>
            </fieldset>

            <div class="form-actions">
                <button class="btn edit" type="submit">Modifier</button>
                <a class="btn btn-back" href="manage_btn.php">Retour</a>
            </div>
        </form>
    </main>

    <?php include __DIR__ . '/../header-footer/footer.php'; ?>
</body>
</html>
