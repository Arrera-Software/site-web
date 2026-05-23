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

    // Préparer la requête pour vérifier les informations d'identification et récupérer le rôle
    $stmt = $pdo->prepare("SELECT user.identifiant, user.password, role.nom_role AS role_nom FROM user INNER JOIN role ON user.role = role.id WHERE user.identifiant = :identifiant");

    $stmt->bindParam(':identifiant', $user);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // Vérifier le mot de passe
        if (password_verify($pass, $row['password'])) {
            // Connexion réussie
            session_start(); // Démarrer la session
            $_SESSION['identifiant'] = $user; // Ajouter l'identifiant dans la session
            $_SESSION['role'] = $row['role_nom']; // Ajouter le rôle en texte dans la session

            header("Location: ../index");
            exit(); // Ajouter exit après header pour éviter l'exécution du code suivant
        } else {
            // Échec de la connexion
            echo "Nom d'utilisateur ou mot de passe incorrect.";
        }
    } else {
        // Échec de la connexion
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>