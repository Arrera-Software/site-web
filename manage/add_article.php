<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    session_start();
    $root = dirname(__DIR__, 2);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Articles</title>
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/add_article.css">
    <link rel="icon" href="/img/logo-arrera.webp">
</head>

<body>
   <?php include '../header-footer/header.php'; ?>
   <section>
       <?php
           // Lister les images disponibles dans /img et /uploads pour réutilisation
           $imgDir = dirname(__DIR__, 1) . '/img';
           $uploadsDir = dirname(__DIR__, 1) . '/uploads';

           $availableImages = [];
           if (is_dir($imgDir)) {
               foreach (scandir($imgDir) as $f) {
                   if ($f === '.' || $f === '..') continue;
                   $availableImages[] = 'img/' . $f;
               }
           }
           if (is_dir($uploadsDir)) {
               foreach (scandir($uploadsDir) as $f) {
                   if ($f === '.' || $f === '..') continue;
                   $availableImages[] = 'uploads/' . $f;
               }
           }
       ?>

       <h1>Ajouter un article</h1>
       <form action="/scripts/ajouter_article.php" method="post" enctype="multipart/form-data">
           <label for="titre">Titre</label><br>
           <input type="text" id="titre" name="titre" required style="width:100%;"><br><br>

           <label for="contenu">Contenu</label><br>
           <textarea id="contenu" name="contenu" rows="12" style="width:100%;" required></textarea><br><br>

           <fieldset>
               <legend>Image (optionnel)</legend>
               <label><input type="radio" name="image_choice" value="none" checked> Aucune image</label><br>
               <label><input type="radio" name="image_choice" value="existing"> Utiliser une image existante</label>
               <select name="existing_image" id="existing_image" style="display:none; margin-left:8px;">
                   <option value="">-- choisir --</option>
                   <?php foreach ($availableImages as $img): ?>
                       <option value="<?php echo htmlspecialchars($img); ?>"><?php echo htmlspecialchars($img); ?></option>
                   <?php endforeach; ?>
               </select>
               <br>
               <label><input type="radio" name="image_choice" value="upload"> Télécharger une nouvelle image</label>
               <input type="file" name="pj_image" id="pj_image" accept="image/*" style="display:none;"><br>
           </fieldset>

           <br>
           <button type="submit" class="btn btn-create">Publier l'article</button>
       </form>

       <script>
           // Toggle visibility of image inputs
           const radios = document.querySelectorAll('input[name="image_choice"]');
           const existingSelect = document.getElementById('existing_image');
           const fileInput = document.getElementById('pj_image');
           radios.forEach(r => r.addEventListener('change', () => {
               if (r.value === 'existing' && r.checked) {
                   existingSelect.style.display = 'inline-block';
                   fileInput.style.display = 'none';
               } else if (r.value === 'upload' && r.checked) {
                   existingSelect.style.display = 'none';
                   fileInput.style.display = 'inline-block';
               } else if (r.value === 'none' && r.checked) {
                   existingSelect.style.display = 'none';
                   fileInput.style.display = 'none';
               }
           }));
       </script>
   </section>
   <?php include '../header-footer/footer.php'; ?>
</body>