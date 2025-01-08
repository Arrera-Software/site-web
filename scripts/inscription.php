<?php
require_once '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifiant = $_POST['identifiant'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    // Vérification de la correspondance des mots de passe
    if ($password !== $password2) {
        echo "<script>alert('Les mots de passe ne correspondent pas.');</script>";
        header("Location: ../inscription");
        exit();
    }

    try {
        // Vérification de l'identifiant unique
        $check_stmt = $pdo->prepare("SELECT COUNT(*) FROM user WHERE identifiant = ?");
        $check_stmt->execute([$identifiant]);
        
        if ($check_stmt->fetchColumn() > 0) {
            echo "<script>alert('Cet identifiant existe déjà.');</script>";
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
        echo "<script>alert('Erreur, veuillez réessayer.');</script>";
        header("Location: ../inscription");
        exit();
    }
}
?>
