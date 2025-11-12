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
    // Suppression définitive
    $del = $pdo->prepare('DELETE FROM archive WHERE id = :id');
    $del->bindParam(':id', $archiveId, PDO::PARAM_INT);
    $del->execute();

    header('Location: /manage/manage_archive.php?deleted=1');
    exit();
} catch (PDOException $e) {
    header('Location: /manage/manage_archive.php?error=' . urlencode($e->getMessage()));
    exit();
}

?>
