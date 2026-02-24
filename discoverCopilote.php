<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details : Arrera Copilote</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/discover.css">
    <link rel="icon" href="img/logo-arrera.webp">
</head>
<body>
    <?php include 'header-footer/header.php'; ?>

    <section>
    <h1>Arrera Copilote</h1>
    <div class ="detail-container">
        <p>Si vous cherche a utiliser Arrera Six et Arrera Ryley dans la meme interface Arrera Copilote et de retour. L'assistant qui n'est pas vraiment un assistant apparentere mais l'aliance de Six et Ryley</p>
        <img src="img/copilot-icon.webp" alt="copilote_icon" class="img-detail">
    </div>

    <h1>Style de l'interface modernisé</h1>
    <div class ="detail-container">
        <img src="img/palette_couleur_copilote.webp" alt="palette_couleur_copilote" class="img-detail">
        <p>Comme les deux autres assistants, Arrera Copilote arrive avec la deuxième version d'Arrera TK qui ajoute un thème Material 3 Expressive conçu pour Google. Cet ajout permet de mettre des thèmes de couleur aux interfaces. Et le thème de couleur utilisé par Copilote est violet.</p>
    </div>

    <h1>Arrivée de modèle d'intelligence artificielle local</h1>
    <div class ="detail-container">
        <p>Comme Arrera Copilote utilise la base d'Arrera Ryley et Six, il utilise aussi des modèles d'IA open-source stockés sur votre ordinateur. Ce qui permet de garantir à Arrera que si vous décidez d'activer les fonctions IA de l'assistant, aucune donnée ne sera envoyée au développeur du modèle ou même à Arrera.</p>
        <img src="img/ia_copilote.webp" alt="ia_copilote" class="img-detail">
    </div>

    <h1>Différence avec Six et Ryley</h1>
    <div class ="detail-container">
        <img src="img/3_assistant.webp" alt="3_assistant" class="img-detail">    
        <p>La grande différence entre Arrera Copilote, Six et Ryley est qu'il utilise les deux assistants pour vous répondre dans les meilleures conditions et a toutes les fonctionnalités comme les commandes vocales (qui peuvent être désactivées, pas comme Six), la réponse à voix haute (peut aussi être désactivée) et la fonctionnalité Codehelp.</p>
    </div>

    <h1>Connexion avec l'application Arrera</h1>
    <div class ="detail-container">
        <p>Comme commencé dans la version I2025 de l'application Arrera et de Arrera Copilote les deux logiciels développés par Arrera peuvent communiquer pour lancer les modes de l'interface ou parler à Six depuis les barres de recherche d'Arrera</p>
        <img src="img/copilote_interface.webp" alt="copilote_interface" class="img-detail">
    </div>

    <h1>Technologie utilisée par l'assistant</h1>
    <div class ="detail-container">
        <img src="img/techno_assistant.webp" alt="techno_assistant" class="img-detail">     
        <p>Comme les deux assistants qu'il fait tourner, Arrera Copilote est entièrement développé en Python version 3.13 (passage à 3.14 prévu). Les interfaces sont développées avec la librairie maison d'Arrera nommée Arrera TK, qui permet de customiser la librairie Python customtkinter à la sauce Arrera et permet l'ajout de widgets custom. Les IA sont gérées par llama-cpp-python. Si vous voulez plus de détails sur la construction technique d'Arrera Copilote, rendez-vous sur la page GitHub du projet et sur la page de l'organisation GitHub Arrera.</p>
    </div>

    <div class = "detail-container-btn">
        <a href="assistant" class="btn">Page assistant</a>
        <a href="" class="btn">Lien du code source</a>
    </div>

    </section>

    <?php include 'header-footer/footer.php'; ?>
</body>
</html>