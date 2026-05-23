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
        <!-- Remplacement temporaire par le logo -->
        <img src="img/arrera_md.webp" alt="edition_md" class="img-detail">
        <p>Arrera Markdown propose une interface claire et minimaliste conçue pour vous concentrer sur l'essentiel : l'écriture. Avec la prévisualisation en temps réel et des raccourcis efficaces, la rédaction de documents n'a jamais été aussi fluide.</p>
    </div>

    <h1>Boosté par l'IA</h1>
    <div class ="detail-container">
        <p>Grâce à son intégration native avec les assistants de l'écosystème Arrera, l'éditeur Markdown vous aide dans votre rédaction. Demandez à l'IA de reformuler des paragraphes, de corriger des fautes ou de générer des structures de documents.</p>
        <!-- Remplacement temporaire par une image IA existante -->
        <img src="img/ia_ryley.webp" alt="ia_integration" class="img-detail">
    </div>

    <h1>Intégration à l'écosystème Arrera</h1>
    <div class ="detail-container">
        <img src="img/arrera_hub.webp" alt="ecosystem_arrera" class="img-detail">
        <p>Arrera Markdown fonctionne main dans la main avec Arrera Hub et les autres outils de la suite. Gérez vos notes, liez vos documents et centralisez vos informations facilement au sein de l'écosystème.</p>
    </div>

    <div class = "detail-container-btn">
        <a href="interface.php" class="btn">Retour à l'interface</a>
    </div>

    </section>

    <?php include 'header-footer/footer.php'; ?>
</body>
</html>
