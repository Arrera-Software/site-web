<?php
// Déplace la logique de modification en base pour les boutons
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Vérifier la connexion
if (!isset($_SESSION['identifiant'])) {
    header('Location: /connexion.php');
    exit();
}

$configFile = __DIR__ . '/../config.php';
if (!file_exists($configFile)) {
    die('Fichier de configuration introuvable.');
}
require_once $configFile;

// Récupérer les données POST
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$link_default = isset($_POST['link_default']) ? trim($_POST['link_default']) : null;
$link_win = isset($_POST['link_win']) ? trim($_POST['link_win']) : null;
$link_mac = isset($_POST['link_mac']) ? trim($_POST['link_mac']) : null;
$link_linux = isset($_POST['link_linux']) ? trim($_POST['link_linux']) : null;
$selectedIcon = isset($_POST['selected_icon']) ? trim($_POST['selected_icon']) : null;

if ($id <= 0) {
    header('Location: /manage/manage_btn.php?error=' . urlencode('ID invalide'));
    exit();
}

try {
    // détecter si la colonne icon existe
    $colStmt = $pdo->prepare("SHOW COLUMNS FROM btn LIKE 'icon'");
    $colStmt->execute();
    $hasIconColumn = ($colStmt->rowCount() > 0);

    // Construire la requête
    $fields = ['link_default = :link_default', 'link_win = :link_win', 'link_mac = :link_mac', 'link_linux = :link_linux'];
    $params = [':link_default' => $link_default, ':link_win' => $link_win, ':link_mac' => $link_mac, ':link_linux' => $link_linux, ':id' => $id];

    if ($hasIconColumn) {
        $fields[] = 'icon = :icon';
        $params[':icon'] = $selectedIcon;
    }

    $sql = 'UPDATE btn SET ' . implode(', ', $fields) . ' WHERE id_btn = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    header('Location: /manage/manage_btn.php?edited=1');
    exit();

} catch (PDOException $e) {
    $msg = 'Erreur SQL : ' . $e->getMessage();
    // Rediriger vers la page d'édition en conservant l'erreur
    header('Location: /manage/edit_btn.php?id=' . urlencode($id) . '&error=' . urlencode($msg));
    exit();
}

?>
