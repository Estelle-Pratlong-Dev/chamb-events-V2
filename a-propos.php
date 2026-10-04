<?php

// Coordonnées et fonctions communes : préparées par le bootstrap.
require __DIR__ . '/includes/bootstrap.php';

// Images communes : chemins définis dans config/images.php.
$images = require __DIR__ . '/config/images.php';

// Clé explicite utilisée par le header et le footer pour le lien actif.
$pageKey = 'about';
?>
<!doctype html>
<html lang="fr">
    <!-- ====================== MÉTADONNÉES ET STYLES ===================== -->

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Découvrez CHAMB-EVENTS, entreprise de location d’animations implantée en Occitanie, et notre accompagnement pour préparer votre événement.">
        <?php if ($site['dev_mode']): ?>
            <meta name="robots" content="noindex, nofollow">
        <?php endif; ?>
        <title>À propos — CHAMB-EVENTS</title>
        <?php if (!$site['dev_mode'] && $site['url'] !== ''): ?>
            <link rel="canonical" href="<?= e(rtrim($site['url'], '/') . '/a-propos.php') ?>">
        <?php endif; ?>
        <link rel="icon" type="image/png" href="<?= e($images['favicon']) ?>">
        <link rel="stylesheet" href="css/styles.css?v=<?= e($site['asset_version']) ?>">
        <link rel="stylesheet" href="css/about.css?v=<?= e($site['asset_version']) ?>">
    </head>
    <body class="page-about">
        <a class="skip" href="#main">
            Aller au contenu
        </a>
        <?php require __DIR__ . "/includes/header.php"; ?>
        <main id="main">
            <!-- =============================== HERO ============================= -->

            <section class="page-hero wrap">
                <div>
                    <span class="eyebrow">
                        À PROPOS DE CHAMB-EVENTS
                    </span>
                    <h1>
                        Le plaisir de faire
                        <em>
                            la fête ensemble.
                        </em>
                    </h1>
                    <p>
                        Des animations pour vos événements, en Occitanie depuis plusieurs années.
                    </p>
                    <a class="button" href="nos-locations.php">
                        Découvrir nos animations
                    </a>
                </div>
                <figure class="hero-figure">
                    <img class="page-hero-image" src="<?= e($images['ambiance_carrousel']) ?>" alt="Illustration d’ambiance : un carrousel lumineux sous des fanions colorés" fetchpriority="high">
                    <figcaption>
                        Illustration d’ambiance
                    </figcaption>
                </figure>
            </section>

            <!-- ================== PRÉSENTATION ET ACCOMPAGNEMENT ================== -->

            <section id="apropos" class="about wrap section">
                <div>
                    <span class="eyebrow">
                        L’ESPRIT CHAMB EVENTS
                    </span>
                    <h2>
                        La fête commence
                        <br>
                        avec une bonne idée.
                    </h2>
                    <p>
                        <?= e($site['description']) ?>
                    </p>
                    <p>
                        <?= e($site['location_description']) ?>
                    </p>
                    <p>
                        Fêtes de village, événements d’entreprise ou fêtes privées : nous vous aidons à choisir les animations adaptées à votre projet.
                    </p>
                </div>
                <div class="steps">
                    <div>
                        <span>
                            01
                        </span>
                        <div>
                            <h3>
                                Parlons de votre fête
                            </h3>
                            <p>
                                Date, lieu, public et envies : racontez-nous votre projet.
                            </p>
                        </div>
                    </div>
                    <div>
                        <span>
                            02
                        </span>
                        <div>
                            <h3>
                                Choisissons vos animations
                            </h3>
                            <p>
                                Les possibilités se précisent selon l’espace et les disponibilités.
                            </p>
                        </div>
                    </div>
                    <div>
                        <span>
                            03
                        </span>
                        <div>
                            <h3>
                                Préparons le grand jour
                            </h3>
                            <p>
                                Les modalités et les besoins d’installation sont définis dans votre devis.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================== BANDEAU DE CONTACT ================== -->

            <?php require __DIR__ . "/includes/prefooter.php"; ?>
        </main>
        <?php require __DIR__ . "/includes/footer.php"; ?>
        <!-- ============================== SCRIPTS ========================== -->

        <script src="js/script.js?v=<?= e($site['asset_version']) ?>"></script>
    </body>
</html>
