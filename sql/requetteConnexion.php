<?php
require '../config.php';
$name = $_POST['name'];
$password = $_POST['password'];

$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

$sql = "SELECT name,password FROM user WHERE name=? ";
// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

$requette = $conn->prepare($sql);
$requette->bind_param("s",$name);
if ($requette->execute())
{
    $result = $requette->get_result();
    if ($result->num_rows == 0)
    {
        $row = $result->fetch_assoc();
        $bddPassword = $row['password'];

        if (password_verify($password, $bddPassword)) {
            return true;
        } else {
            echo false;
        }
    }

}
?>