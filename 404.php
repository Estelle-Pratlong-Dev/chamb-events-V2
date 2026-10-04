<?php

// Renvoie un vrai statut 404, y compris lors d’un accès direct à cette page.
http_response_code(404);

// Préparation commune et images utilisées par le header et le footer.
require __DIR__ . '/includes/bootstrap.php';
$images = require __DIR__ . '/config/images.php';
$pageKey = 'error';
?>
<!doctype html>
<html lang="fr">
    <!-- ====================== MÉTADONNÉES ET STYLES ===================== -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, follow">
        <title>Page introuvable — CHAMB-EVENTS</title>
        <!-- Les liens restent valides même depuis une adresse inexistante imbriquée. -->
        <base href="/">
        <link rel="icon" type="image/png" href="<?= e($images['favicon']) ?>">
        <link rel="stylesheet" href="css/styles.css?v=<?= e($site['asset_version']) ?>">
    </head>
    <body class="page-error">
        <a class="skip" href="#main">Aller au contenu</a>
        <?php require __DIR__ . '/includes/header.php'; ?>
        <main id="main">
            <!-- ======================== PAGE INTROUVABLE ======================= -->
            <section class="wrap section error-page">
                <span class="eyebrow">ERREUR 404</span>
                <h1>Cette page est introuvable.</h1>
                <p>Le lien est peut-être incorrect ou la page a été déplacée.</p>
                <div class="error-actions">
                    <a class="button" href="index.php">Revenir à l’accueil</a>
                    <a class="button" href="nos-locations.php">Voir nos locations</a>
                </div>
            </section>
        </main>
        <?php require __DIR__ . '/includes/footer.php'; ?>
        <script src="js/script.js?v=<?= e($site['asset_version']) ?>"></script>
    </body>
</html>
