<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

// Protection : l'utilisateur doit être connecté
if (!isset($_SESSION['identifiant'])) {
    header('Location: /connexion.php');
    exit();
}

// Inclure config
$configFile = __DIR__ . '/../config.php';
if (!file_exists($configFile)) {
    die('Fichier de configuration introuvable : ' . $configFile);
}
require_once $configFile;

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['archive_id'])) {
    header('Location: /manage/manage_archive.php');
    exit();
}

$archiveId = intval($_POST['archive_id']);
if ($archiveId <= 0) {
    header('Location: /manage/manage_archive.php?error=1');
    exit();
}

try {
    $pdo->beginTransaction();

    // Récupérer l'entrée dans la table archive
    $select = $pdo->prepare('SELECT * FROM archive WHERE id = :id');
    $select->bindParam(':id', $archiveId, PDO::PARAM_INT);
    $select->execute();
    $row = $select->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        $pdo->rollBack();
        header('Location: /manage/manage_archive.php?notfound=1');
        exit();
    }

    // Insérer dans articles
    $ins = $pdo->prepare('INSERT INTO articles (titre, contenu, pj_image, date_creation, editeur) VALUES (:titre, :contenu, :pj_image, :date_creation, :editeur)');
    $ins->bindValue(':titre', $row['titre']);
    $ins->bindValue(':contenu', isset($row['contenu']) ? $row['contenu'] : '');
    $ins->bindValue(':pj_image', isset($row['pj_image']) ? $row['pj_image'] : null);
    $ins->bindValue(':date_creation', isset($row['date_creation']) ? $row['date_creation'] : null);
    $ins->bindValue(':editeur', isset($row['editeur']) ? $row['editeur'] : null);
    $ins->execute();

    // Supprimer de archive
    $del = $pdo->prepare('DELETE FROM archive WHERE id = :id');
    $del->bindParam(':id', $archiveId, PDO::PARAM_INT);
    $del->execute();

    $pdo->commit();
    header('Location: /manage/manage_archive.php?restored=1');
    exit();
} catch (PDOException $e) {
    if ($pdo->inTransaction()) $pdo->rollBack();
    header('Location: /manage/manage_archive.php?error=' . urlencode($e->getMessage()));
    exit();
}

?>
