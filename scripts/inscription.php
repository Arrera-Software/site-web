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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifiant = $_POST['identifiant'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    // Vérification de la correspondance des mots de passe
    if ($password !== $password2) {
        echo "<script>console.log('Les mots de passe ne correspondent pas.');</script>";
        header("Location: ../inscription");
        exit();
    }

    try {
        // Vérification de l'identifiant unique
        $check_stmt = $pdo->prepare("SELECT COUNT(*) FROM user WHERE identifiant = ?");
        $check_stmt->execute([$identifiant]);
        
        if ($check_stmt->fetchColumn() > 0) {
            echo "<script>console.log('Cet identifiant existe déjà.');</script>";
            header("Location: ../connexion");
            exit();
        }

        // Insertion de l'utilisateur avec uniquement identifiant et mot de passe hashé
        $stmt = $pdo->prepare("INSERT INTO user (identifiant, password) VALUES (?, ?)");
        $stmt->execute([
            $identifiant,
            password_hash($password, PASSWORD_DEFAULT) // Le mot de passe est hashé ici
        ]);

        header("Location: ../connexion");
        exit();

    } catch (PDOException $e) {
        echo "<script>console.log('Erreur, veuillez réessayer.');</script>";
        header("Location: ../inscription");
        exit();
    }
}
?>
