<?php
// Afficher les erreurs pour le débogage
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Vérifier si le fichier config.php existe
$configFile = __DIR__ . '/../config.php';
if (!file_exists($configFile)) {
    die("Le fichier config.php n'existe pas dans : " . $configFile);
}

// Inclure le fichier de configuration
require_once $configFile;

// Vérifier si $pdo est défini
if (!isset($pdo)) {
    die("La connexion PDO n'a pas été établie correctement");
}

// Récupération des données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['identifiant'];
    $pass = $_POST['password'];

    // Préparer la requête pour vérifier les informations d'identification
    $stmt = $pdo->prepare("SELECT * FROM user WHERE identifiant = :identifiant");
    $stmt->bindParam(':identifiant', $user);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // Vérifier le mot de passe
        if (password_verify($pass, $row['password'])) {
            // Connexion réussie
            echo "vive apple";
        } else {
            // Échec de la connexion
            echo "1.Nom d'utilisateur ou mot de passe incorrect.";
        }
    } else {
        // Échec de la connexion
        echo "2.Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>