<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

// Protection : l'utilisateur doit être connecté
if (!isset($_SESSION['identifiant'])) {
    header('Location: /connexion.php');
    exit();
}

// Vérifier et inclure la configuration (PDO)
$configFile = __DIR__ . '/../config.php';
if (!file_exists($configFile)) {
    die('Fichier de configuration introuvable : ' . $configFile);
}
require_once $configFile;

// Attendre un POST avec delete_id
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['delete_id'])) {
    header('Location: /manage/manage_article.php');
    exit();
}

$deleteId = intval($_POST['delete_id']);
if ($deleteId <= 0) {
    header('Location: /manage/manage_article.php?error=1');
    exit();
}

try {
    // Début de transaction
    $pdo->beginTransaction();

    // Récupérer l'article
    $select = $pdo->prepare('SELECT titre, contenu, pj_image, date_creation, editeur FROM articles WHERE id = :id');
    $select->bindParam(':id', $deleteId, PDO::PARAM_INT);
    $select->execute();
    $article = $select->fetch(PDO::FETCH_ASSOC);

    if (!$article) {
        $pdo->rollBack();
        header('Location: /manage/manage_article.php?notfound=1');
        exit();
    }

    // Insérer dans la table archive (la table existe déjà selon votre message)
    $ins = $pdo->prepare('INSERT INTO archive (titre, contenu, pj_image, date_creation, editeur) VALUES (:titre, :contenu, :pj_image, :date_creation, :editeur)');
    $ins->bindValue(':titre', $article['titre']);
    $ins->bindValue(':contenu', isset($article['contenu']) ? $article['contenu'] : '');
    $ins->bindValue(':pj_image', isset($article['pj_image']) ? $article['pj_image'] : null);
    $ins->bindValue(':date_creation', isset($article['date_creation']) ? $article['date_creation'] : null);
    $ins->bindValue(':editeur', isset($article['editeur']) ? $article['editeur'] : null);
    $ins->execute();

    // Supprimer l'original
    $del = $pdo->prepare('DELETE FROM articles WHERE id = :id');
    $del->bindParam(':id', $deleteId, PDO::PARAM_INT);
    $del->execute();

    $pdo->commit();
    header('Location: /manage/manage_article.php?archived=1');
    exit();
} catch (PDOException $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    // Pour débogage on peut renvoyer le message d'erreur en GET (optionnel)
    header('Location: /manage/manage_article.php?error=' . urlencode($e->getMessage()));
    exit();
}

?>
