<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="img/logo-arrera.webp">
</head>

<body>
    <?php include 'header-footer/header.php'; ?>

    <!-- Section de présentation style Apple -->
    <section class="hero-section dark-theme">
        <div class="container-accueil">
            <h1 class="title">Arrera Software<br></h1>
            <h2 class="texte">Une organisation de développement de logiciels open-source spécialisée dans les assistants
                personnels.</h2>
                
        </div>
    </section>
    <?php include 'header-footer/footer.php'; ?>

</body>

</html>