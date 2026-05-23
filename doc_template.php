<?php
/**
 * Template de documentation Markdown
 * 
 * Variables requises:
 * - $pageTitle: Titre de la page
 * - $markdownFile: Chemin du fichier markdown (relatif à la racine)
 * - $backUrl: URL de retour (optionnel)
 * - $backText: Texte du bouton retour (optionnel)
 */

// Valeurs par défaut
$backUrl = $backUrl ?? 'assistant';
$backText = $backText ?? 'Retour à la page assistant';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/documentation.css">
    <link rel="icon" href="img/logo-arrera.webp">
</head>
<body>
    <?php require_once 'header-footer/header.php'; ?>
    
    <div class="markdown-content">
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        require __DIR__ . '/vendor/autoload.php';

        use League\CommonMark\CommonMarkConverter;

        $converter = new CommonMarkConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);

        echo $converter->convert(
            file_get_contents(__DIR__ . '/' . $markdownFile)
        )->getContent();
        ?>
    </div>
    
    <a class="back_assistant" href="<?php echo htmlspecialchars($backUrl); ?>">
        <?php echo htmlspecialchars($backText); ?>
    </a>
    
    <?php require_once 'header-footer/footer.php'; ?>
</body>
</html>
