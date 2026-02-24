<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details : Arrera Ryley</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/discover.css">
    <link rel="icon" href="img/logo-arrera.webp">
</head>
<body>
    <?php include 'header-footer/header.php'; ?>

    <section>
    <h1>Arrera Ryley</h1>
    <div class ="detail-container">
        <p>Arrera Ryley est de retour ! Le deuxième assistant d'Arrera est basé sur le texte.</p>
        <img src="img/ryley-icon.webp" alt="ryley_icon" class="img-detail">
    </div>

    <h1>Style de l'interface modernisé</h1>
    <div class ="detail-container">
        <img src="img/palette_couleur_ryley_six.webp" alt="palette_couleur_ryley_six" class="img-detail">
        <p>Comme Arrera Copilote et Six cette année, Ryley arrive avec la version 2 de la librairie graphique Arrera TK. Qui arrive avec le thème de Google Material 3 Expresive, ce qui permet d'avoir des thèmes de couleur. Et Ryley, comme Six, utilise un thème de couleur bleu/bleu clair.</p>
        
    </div>

    <h1>Arrivée de modèle d'intelligence artificielle local</h1>
    <div class ="detail-container">
        <p>L'année 2026 marque l'arrivée de modèles d'IA locale dans Arrera Ryley. Ces modèles open-source tournent totalement en local. L'utilisation de ce type de modèles permet de garantir une sécurité totale de vos données qui ne sont pas envoyées au développeur du modèle ou à Arrera.</p>
        <img src="img/ia_ryley.webp" alt="ia_ryley" class="img-detail">
    </div>

    <h1>Différence avec Six et Copilote</h1>
    <div class ="detail-container">
        <img src="img/3_assistant.webp" alt="3_assistant" class="img-detail">     
        <p>En tant que deuxième assistant d'Arrera, Ryley n'est pas une copie de Six avec la seule différence qu'il utilise le texte au lieu de commandes vocales. Ryley ajoute la suite de fonctions codehelp, qui est une suite de fonctions orientées pour les développeurs. Cette fonctionnalité arrive avec 4 GUI supplémentaires qui sont Organisateur de variable, Gestionnaire GitHub, Sélecteur de couleur et Librairie Arrera.</p>
    </div>

    <h1>Connexion avec l'application Arrera</h1>
    <div class ="detail-container">
        <p>Comme commencé dans la version I2025 de l'application Arrera et de Arrera Ryley, les deux logiciels développés par Arrera peuvent communiquer pour lancer les modes de l'interface ou parler à Six depuis les barres de recherche d'Arrera</p>
        <img src="img/ryley_interface.webp" alt="ryley_interface" class="img-detail">
    </div>

    <h1>Technologie utilisée par l'assistant</h1>
    <div class ="detail-container">
        <img src="img/techno_assistant.webp" alt="techno_assistant" class="img-detail">    
        <p>L'assistant Arrera Ryley et sa base Arrera Neuron Network sont entièrement développés en Python version 3.13 (passage à Python 3.14 prévu). L'interface graphique est développée avec Arrera TK, qui est une librairie qui vient customiser customtkinter. Pour la gestion des modèles d'IA, il utilise llama-cpp-python. Si vous voulez plus de détails sur la construction technique d'Arrera Ryley et Arrera Neuron Network, rendez-vous sur la page GitHub du projet.</p>
    </div>

    <div class = "detail-container-btn">
        <a href="assistant" class="btn">Page assistant</a>
        <a href="" class="btn">Lien du code source</a>
    </div>

    </section>

    <?php include 'header-footer/footer.php'; ?>
</body>
</html>