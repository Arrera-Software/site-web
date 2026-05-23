<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details : Arrera Markdown</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/discover.css">
    <link rel="icon" href="img/logo-arrera.webp">
</head>
<body>
    <?php include 'header-footer/header.php'; ?>

    <section>
    <h1>Arrera Markdown</h1>
    <div class ="detail-container">
        <p>L'éditeur de Markdown de l'écosystème Arrera qui est boosté avec des modules d'intelligence artificielle grâce à la connexion avec les assistants d'Arrera.</p>
        <img src="img/arrera_md.webp" alt="arrera_md_icon" class="img-detail">
    </div>

    <h1>Édition simplifiée</h1>
    <div class ="detail-container">
        <img src="img/editeur_md.webp" alt="edition_md" class="img-detail">
        <p>Arrera Markdown s'appuie sur le format de fichier Markdown qui permet d'avoir un texte formaté et des tailles de fichier assez réduites. Son éditeur permet de visualiser le texte formaté en temps réel, sans avoir à quitter l'éditeur</p>
    </div>

    <h1>Interface QT stylisée</h1>
    <div class ="detail-container">
        <p>Arrera Markdown est le premier logiciel de l'écosystème Arrera à utiliser une librairie de style QT nommée Arrera QT qui permet de donner un style Material 3 expressive à l'interface pour donner le même style entre les applications et les assistants qui eux utilisent Arrera TK</p>
        <img src="img/interface_md.webp" alt="Interface" class="img-detail">
    </div>

    <h1>Connexion avec les assistants Arrera</h1>
    <div class ="detail-container">
        <img src="img/assistant_markdown.webp" alt="assistant_markdown" class="img-detail">
        <p>Arrera Markdown est aussi équipé d'une connexion avec les trois assistants d'Arrera, ce qui permet d'avoir des options IA dans l'éditeur</p>
    </div>

    <div class = "detail-container-btn">
        <a href="interface.php" class="btn">Retour à l'interface</a>
    </div>

    </section>

    <?php include 'header-footer/footer.php'; ?>
</body>
</html>
