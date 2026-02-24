<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details : Arrera Six</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/discover.css">
    <link rel="icon" href="img/logo-arrera.webp">
</head>
<body>
    <?php include 'header-footer/header.php'; ?>

    <section>
    <h1>Arrera Six</h1>
    <div class ="detail-container">
        <p>L'Assistant Arrera SIX est de retour ! Redécouvrez le tout premier assistant numérique vocal historique d'Arrera. </p>
        <img src="img/six-icon.webp" alt="six_icon" class="img-detail">
    </div>

    <h1>Style de l'interface modernisé</h1>
    <div class ="detail-container">
        <img src="img/palette_couleur_ryley_six.webp" alt="palette_couleur_ryley_six" class="img-detail">
        <p>Cette année Six arrive avec une grosse mise à jour de librairie graphique d'Arrera nommée Arrera TK. Qui cette année possède un thème ressemblant au style Material 3 Expresive conçu par google et annoncé en été 2025.  
Et Six aura un thème de couleur bleu/bleu clair.</p>
        
    </div>

    <h1>Arrivée de modèle d'intelligence artificielle local</h1>
    <div class ="detail-container">
        <p>L'année 2026 marque l'arrivée de modèles d'IA locale dans Arrera SIX. Ces modèles open-source tournent totalement en local. L'utilisation de ce type de modèles permet de garantir une sécurité totale de vos données qui ne sont pas envoyées au développeur du modèle ou à Arrera.</p>
        <img src="img/ia_six.webp" alt="ia_six" class="img-detail">
    </div>

    <h1>Différence avec Ryley et Copilote</h1>
    <div class ="detail-container">
        <img src="img/3_assistant.webp" alt="3_assistant" class="img-detail">     
        <p>Même si Arrera Six n'est pas le seul assistant d'Arrera, il reste unique. C'est le seul à inclure un système de réponse à voix haute permanent et un système de trigger word permanent aussi. Puis c'est le seul qui vous accueille avec son icône qui est un petit robot qui comporte beaucoup d'émotions.</p>
    </div>

    <h1>Connexion avec l'application Arrera</h1>
    <div class ="detail-container">
        <p>Comme commencé dans la version I2025 de l'application Arrera et de Six, les deux logiciels développés par Arrera peuvent communiquer pour lancer les modes de l'interface ou parler à Six depuis les barres de recherche d'Arrera</p>
        <img src="img/six_interface.webp" alt="six_interface" class="img-detail">
    </div>

    <h1>Technologie utilisée par l'assistant</h1>
    <div class ="detail-container">
        <img src="img/techno_assistant.webp" alt="techno_assistant" class="img-detail">    
        <p>L'assistant Arrera Six est entièrement développé en Python version 3.13 (passage à Python 3.14 prévu). L'interface graphique est développée avec Arrera TK, qui est une librairie qui vient customiser customtkinter. Pour la gestion des modèles d'IA, il utilise llama-cpp-python. Si vous voulez plus de détails sur la construction technique d'Arrera SIX, rendez-vous sur la page GitHub du projet.</p>
    </div>

    <div class = "detail-container-btn">
        <a href="assistant" class="btn">Page assistant</a>
        <a href="https://github.com/Arrera-Software/Six" class="btn">Lien du code source</a>
    </div>

    </section>

    <?php include 'header-footer/footer.php'; ?>
</body>
</html>