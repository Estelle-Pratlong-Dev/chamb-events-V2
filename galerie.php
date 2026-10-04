<?php

// Coordonnées et fonctions communes : préparées par le bootstrap.
require __DIR__ . '/includes/bootstrap.php';

// Images communes : chemins définis dans config/images.php.
$images = require __DIR__ . '/config/images.php';

// Clé explicite utilisée par le header et le footer pour le lien actif.
$pageKey = 'gallery';
?>
<!doctype html>
<html lang="fr">
    <!-- ====================== MÉTADONNÉES ET STYLES ===================== -->

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Les animations CHAMB-EVENTS en images : installations de gonflables et rencontres avec les mascottes au fil des événements.">
        <?php if ($site['dev_mode']): ?>
            <meta name="robots" content="noindex, nofollow">
        <?php endif; ?>
        <title>Galerie photo — CHAMB-EVENTS</title>
        <?php if (!$site['dev_mode'] && $site['url'] !== ''): ?>
            <link rel="canonical" href="<?= e(rtrim($site['url'], '/') . '/galerie.php') ?>">
        <?php endif; ?>
        <link rel="icon" type="image/png" href="<?= e($images['favicon']) ?>">
        <link rel="stylesheet" href="css/styles.css?v=<?= e($site['asset_version']) ?>">
        <link rel="stylesheet" href="css/locations.css?v=<?= e($site['asset_version']) ?>">
    </head>
    <body class="page-gallery">
        <a class="skip" href="#main">
            Aller au contenu
        </a>
        <?php require __DIR__ . '/includes/header.php'; ?>
        <main id="main">
            <!-- =============================== HERO ============================= -->

            <section class="page-hero wrap page-hero-compact">
                <div class="heading">
                    <span class="eyebrow">
                        LES ÉVÉNEMENTS EN IMAGES
                    </span>
                    <h1>
                        La galerie photo
                    </h1>
                    <p>
                        Des installations et des rencontres avec les mascottes, au fil des événements.
                    </p>
                </div>
            </section>

            <!-- ================== PHOTOS DES ÉVÉNEMENTS ================== -->

            <section class="wrap section event-gallery" id="galerie">
                <div class="photo-grid">
                    <button class="gallery-photo" data-title="Deux univers de jeu" data-src="<?= e($images['duo']) ?>">
                        <img src="<?= e($images['duo']) ?>" alt="Deux univers de jeu" loading="lazy">
                        <span>
                            Deux univers de jeu
                        </span>
                    </button>
                    <button class="gallery-photo" data-title="Les gonflables en plein air" data-src="<?= e($images['ensemble']) ?>">
                        <img src="<?= e($images['ensemble']) ?>" alt="Les gonflables en plein air" loading="lazy">
                        <span>
                            Les gonflables en plein air
                        </span>
                    </button>
                    <button class="gallery-photo" data-category="Mascottes" data-title="Rencontre avec les mascottes" data-src="<?= e($images['mascottes_personnages']) ?>">
                        <img src="<?= e($images['mascottes_personnages']) ?>" alt="Rencontre avec les mascottes" loading="lazy">
                        <span>
                            Rencontre avec les mascottes
                        </span>
                    </button>
                    <button class="gallery-photo" data-category="Mascottes" data-title="Les mascottes en fête" data-src="<?= e($images['mascottes_fete']) ?>">
                        <img src="<?= e($images['mascottes_fete']) ?>" alt="Les mascottes en fête" loading="lazy">
                        <span>
                            Les mascottes en fête
                        </span>
                    </button>
                    <button class="gallery-photo" data-category="Mascottes" data-title="Buzz et Woody" data-src="<?= e($images['buzz_woody']) ?>">
                        <img src="<?= e($images['buzz_woody']) ?>" alt="Buzz et Woody" loading="lazy">
                        <span>
                            Buzz et Woody
                        </span>
                    </button>
                </div>
            </section>

            <!-- ================== AGRANDISSEMENT DES PHOTOS ================== -->

            <dialog id="photo-dialog">
                <button class="close" aria-label="Fermer la photo">
                    ×
                </button>
                <img id="large-photo" alt="">
                <h2 id="photo-caption">
                </h2>
                <div id="rental-information">
                </div>
            </dialog>

            <!-- ================== BANDEAU DE CONTACT ================== -->

            <?php require __DIR__ . '/includes/prefooter.php'; ?>
        </main>
        <?php require __DIR__ . '/includes/footer.php'; ?>
        <!-- ============================== SCRIPTS ========================== -->

        <script src="js/script.js?v=<?= e($site['asset_version']) ?>"></script>
        <script src="js/locations.js?v=<?= e($site['asset_version']) ?>"></script>
    </body>
</html>
