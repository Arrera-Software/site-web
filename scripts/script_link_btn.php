<?php
function getLink(PDO $pdo,$name) {    
    // Récupérer les liens depuis la base de données
    $stmt = $pdo->prepare("SELECT link_default, link_win, link_mac, link_linux FROM btn WHERE name_btn = :name LIMIT 1");
    $stmt->execute(['name' => $name]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$row) {
        return null; // Bouton non trouvé
    }
    
    // Détection de l'OS côté serveur (fallback)
    $os = detectOSServer();
    
    // Helper: retourne $specific si non vide (après trim), sinon $default
    $choose = function($specific, $default) {
        $specific = $specific ?? '';
        if (is_string($specific)) $specific = trim($specific);
        if ($specific !== '') return $specific;
        return $default;
    };

    // Sélection du lien approprié — si le lien spécifique est vide on retourne le lien par défaut
    switch($os) {
        case 'windows':
            return $choose($row['link_win'] ?? null, $row['link_default'] ?? null);
        case 'macos':
            return $choose($row['link_mac'] ?? null, $row['link_default'] ?? null);
        case 'linux':
            return $choose($row['link_linux'] ?? null, $row['link_default'] ?? null);
        default:
            return $row['link_default'] ?? null;
    }
}

function detectOSServer() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
    
    if (preg_match('/Windows NT/i', $userAgent)) {
        return 'windows';
    } elseif (preg_match('/Mac OS X/i', $userAgent) && !preg_match('/iPhone|iPad|iPod/i', $userAgent)) {
        return 'macos';
    } elseif (preg_match('/Linux/i', $userAgent) && !preg_match('/Android/i', $userAgent)) {
        return 'linux';
    } elseif (preg_match('/Android/i', $userAgent)) {
        return 'android';
    } elseif (preg_match('/iPhone|iPad|iPod/i', $userAgent)) {
        return 'ios';
    }
    
    return 'unknown';
}
?>
