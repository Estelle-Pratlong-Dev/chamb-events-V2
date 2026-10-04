<?php

// Coordonnées et fonctions communes : préparées par le bootstrap.
require __DIR__ . '/includes/bootstrap.php';

// Images communes : chemins définis dans config/images.php.
$images = require __DIR__ . '/config/images.php';

// Clé explicite utilisée par le header et le footer pour le lien actif.
$pageKey = 'locations';

// Catalogue partagé avec l’autre page : données définies dans data/locations.json.
$locations = json_decode(
    (string) file_get_contents(__DIR__ . '/data/locations.json'),
    true,
    512,
    JSON_THROW_ON_ERROR
);
$universes = require __DIR__ . '/config/mascottes.php';
?>
<!doctype html>
<html lang="fr">
    <!-- ====================== MÉTADONNÉES ET STYLES ===================== -->

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Découvrez les manèges, structures gonflables, mascottes et stands proposés à la location. Consultez leurs caractéristiques et tarifs de départ.">
        <?php if ($site['dev_mode']): ?>
            <meta name="robots" content="noindex, nofollow">
        <?php endif; ?>
        <title>Location de manèges, gonflables et mascottes — CHAMB-EVENTS</title>
        <?php if (!$site['dev_mode'] && $site['url'] !== ''): ?>
            <link rel="canonical" href="<?= e(rtrim($site['url'], '/') . '/nos-locations.php') ?>">
        <?php endif; ?>
        <link rel="icon" type="image/png" href="<?= e($images['favicon']) ?>">
        <link rel="stylesheet" href="css/styles.css?v=<?= e($site['asset_version']) ?>">
        <link rel="stylesheet" href="css/locations.css?v=<?= e($site['asset_version']) ?>">
    </head>
    <body class="page-locations">
        <a class="skip" href="#main">
            Aller au contenu
        </a>
        <?php require __DIR__ . "/includes/header.php"; ?>
        <main id="main">
            <!-- =============================== HERO ============================= -->

            <section class="page-hero wrap page-hero-compact">
                <div class="heading">
                    <span class="eyebrow">
                        MANÈGES · GONFLABLES · MASCOTTES
                    </span>
                    <h1>
                        Nos locations
                    </h1>
                    <p>
                        Des animations pour les petits et les grands, à choisir selon votre événement.
                    </p>
                </div>
            </section>

            <!-- ================== CATALOGUE DES LOCATIONS ================== -->

            <section id="photos" class="wrap section gallery">

                <!-- ================== FILTRES ================== -->

                <div class="filters" aria-label="Filtrer les locations">
                    <button class="active" aria-pressed="true" data-filter="Tous">
                        Toutes les locations
                    </button>
                    <button aria-pressed="false" data-filter="Manèges">
                        Manèges
                    </button>
                    <button aria-pressed="false" data-filter="Structures gonflables">
                        Gonflables
                    </button>
                    <button aria-pressed="false" data-filter="Stands & jeux">
                        Stands & jeux
                    </button>
                    <a href="#mascottes" class="gallery-link">
                        Mascottes
                    </a>
                    <a href="galerie.php" class="gallery-link">
                        Galerie photo
                    </a>
                </div>
                <p class="rental-terms">
                    Tarifs à partir des montants indiqués, en euros HT. Le prix final varie selon la distance, les conditions et la difficulté d’installation, la durée de la prestation et les besoins spécifiques de votre événement. Livraison et installation sont prises en compte dans le devis. Des tarifs dégressifs peuvent s’appliquer selon le nombre d’installations et la durée de location.
                </p>

                <!-- ================== FICHES DU MATÉRIEL ================== -->

                <div class="photo-grid">
                    <?php
                        foreach ($locations as $index => $location):
                    ?>
                        <button class="photo" data-category="<?= e($location['category']) ?>" data-index="<?= $index ?>" data-title="<?= e($location['title']) ?>" data-src="<?= e($location['image']) ?>">
                            <?php if ($location['image'] !== ''): ?>
                                <img src="<?= e($location['image']) ?>" alt="<?= e($location['title']) ?>" loading="lazy">
                            <?php else: ?>
                                <span class="photo-pending">
                                    Photo à venir
                                </span>
                            <?php endif; ?>
                            <span class="rental-title">
                                <?= e($location['title']) ?>
                            </span>
                            <span class="rental-meta">
                                <?php if (isset($location['age'])): ?>
                                    <span class="rental-badge">
                                        Dès
                                        <?= $location['age'] ?>
                                        ans
                                    </span>
                                <?php endif; ?>
                                <?php if (isset($location['capacity'])): ?>
                                    <span class="rental-badge">
                                        <?= $location['capacity'] ?>
                                        joueurs max.
                                    </span>
                                <?php endif; ?>
                            </span>
                            <span class="rental-bottom">
                                <?php if (isset($location['price'])): ?>
                                    <strong>
                                        <small>
                                            À partir de
                                        </small>
                                        <?= $location['price'] ?>
                                        € HT
                                    </strong>
                                <?php endif; ?>
                                <span>
                                    Voir la fiche
                                </span>
                            </span>
                        </button>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- ================== UNIVERS DES MASCOTTES ================== -->

            <section class="wrap section mascots" id="mascottes">
                <div class="heading">
                    <h2>
                        Vos personnages préférés
                    </h2>
                    <p>
                        Des rencontres avec les mascottes pour animer votre événement.
                    </p>
                </div>
                <div class="mascot-grid">
                    <?php
                        foreach ($universes as $universe):
                    ?>
                        <article class="mascot-card">
                            <h3>
                                <?= e($universe['universe']) ?>
                            </h3>
                            <ul>
                                <?php foreach ($universe['names'] as $name): ?>
                                    <li>
                                        <?= e($name) ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </article>
                    <?php endforeach; ?>
                </div>
                <p class="mascot-contact">
                    <a class="button" href="contact.php">
                        Parlons de votre animation mascotte
                    </a>
                </p>
            </section>

            <!-- ================== DEMANDE DE DEVIS ================== -->

            <div class="wrap rental-cta">
                <h2>
                    Une animation vous plaît ?
                </h2>
                <p>
                    Parlons de votre date, de votre lieu et de vos envies.
                </p>
                <a class="button" href="contact.php">
                    Demander un devis
                </a>
            </div>

            <!-- ================== FICHE DÉTAILLÉE ================== -->

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
        </main>
        <?php require __DIR__ . "/includes/footer.php"; ?>
        <!-- ============================== SCRIPTS ========================== -->

        <script src="js/script.js?v=<?= e($site['asset_version']) ?>"></script>
        <script src="js/locations.js?v=<?= e($site['asset_version']) ?>"></script>
    </body>
</html>
