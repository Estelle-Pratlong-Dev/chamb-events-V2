<?php

// Coordonnées et fonctions communes : préparées par le bootstrap.
require __DIR__ . '/includes/bootstrap.php';

// Images communes : chemins définis dans config/images.php.
$images = require __DIR__ . '/config/images.php';

// Clé explicite utilisée par le header et le footer pour le lien actif.
$pageKey = 'home';
?>
<!doctype html>
<html lang="fr">
    <!-- ====================== MÉTADONNÉES ET STYLES ===================== -->

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Location de manèges, gonflables et mascottes pour vos événements en Occitanie, pour les collectivités, entreprises et particuliers.">
        <?php if ($site['dev_mode']): ?>
            <meta name="robots" content="noindex, nofollow">
        <?php endif; ?>
        <title>Location de manèges et gonflables en Occitanie — CHAMB-EVENTS</title>
        <?php if (!$site['dev_mode'] && $site['url'] !== ''): ?>
            <link rel="canonical" href="<?= e(rtrim($site['url'], '/') . '/') ?>">
        <?php endif; ?>
        <link rel="icon" type="image/png" href="<?= e($images['favicon']) ?>">
        <link rel="stylesheet" href="css/styles.css?v=<?= e($site['asset_version']) ?>">
        <link rel="stylesheet" href="css/home.css?v=<?= e($site['asset_version']) ?>">
    </head>
    <body class="page-home">
        <a class="skip" href="#main">
            Aller au contenu
        </a>
        <?php require __DIR__ . "/includes/header.php"; ?>
        <main id="main">

            <!-- ================== HERO ================== -->

            <section id="accueil" class="hero wrap">
                <div class="hero-copy">
                    <img class="festive-splash hero-splash" src="<?= e($images['gouttelettes']) ?>" alt="" aria-hidden="true" width="72" height="72">
                    <h1>
                        Faites de votre événement un
                        <em>
                            grand moment de fête !
                        </em>
                    </h1>
                    <p>
                        Manèges, structures gonflables et mascottes pour les petits et les grands.
                    </p>
                    <div class="actions">
                        <a class="button" href="nos-locations.php">
                            Découvrir nos locations
                        </a>
                        <a class="textlink" href="contact.php">
                            Demander un devis
                        </a>
                    </div>
                </div>
                <img class="hero-image" src="<?= e($images['hero']) ?>" alt="Un carrousel, un château gonflable et une mascotte dans une ambiance de fête" fetchpriority="high">
            </section>

            <!-- ================== PUBLICS ================== -->

            <div class="audiences wrap">
                <span>
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <path d="m3 8 9-5 9 5H3Zm2 0v11m5-11v11m4-11v11m5-11v11M3 19h18M2 22h20"/>
                    </svg>
                    <b>
                        Mairies & collectivités
                    </b>
                </span>
                <span>
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <rect x="3" y="7" width="18" height="14" rx="2"/>
                        <path d="M8 7V4h8v3M3 12h18M10 12v3h4v-3"/>
                    </svg>
                    <b>
                        Comités d’entreprise
                    </b>
                </span>
                <span>
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <circle cx="9" cy="7" r="3"/>
                        <circle cx="18" cy="9" r="2.5"/>
                        <path d="M2 21v-3a7 7 0 0 1 14 0v3M16 14a5 5 0 0 1 6 5v2"/>
                    </svg>
                    <b>
                        Particuliers
                    </b>
                </span>
            </div>

            <!-- ================== UNIVERS DE LOCATION ================== -->

            <section id="locations" class="wrap section">
                <div class="heading">
                    <h2>
                        À chaque fête, son animation
                    </h2>
                    <p>
                        Découvrez nos univers et trouvez l’animation idéale pour votre événement.
                    </p>
                </div>
                <div class="cards">
                    <article>
                        <img src="<?= e($images['manege']) ?>" alt="Chevaux d’un manège traditionnel" loading="lazy">
                        <div>
                            <h3>
                                Manèges
                            </h3>
                            <p>
                                Le charme des fêtes foraines pour les petits et les grands.
                            </p>
                        </div>
                    </article>
                    <article>
                        <img src="<?= e($images['gonflable']) ?>" alt="Une structure gonflable multicolore" loading="lazy">
                        <div>
                            <h3>
                                Structures gonflables
                            </h3>
                            <p>
                                Des espaces de jeu colorés pour se dépenser et s’amuser.
                            </p>
                        </div>
                    </article>
                    <article>
                        <img src="<?= e($images['mascotte']) ?>" alt="Une mascotte écureuil accueillant le public" loading="lazy">
                        <div>
                            <h3>
                                Mascottes
                            </h3>
                            <p>
                                Une rencontre pleine de sourires et de souvenirs à partager.
                            </p>
                        </div>
                    </article>
                </div>
                <div class="locations-link">
                    <a class="button" href="nos-locations.php">Découvrir nos locations</a>
                </div>
            </section>

            <!-- ================== ÉVÉNEMENTS ================== -->

            <section class="wrap section events">
                <div class="heading">
                    <h2>
                        Des animations pour tous vos événements
                    </h2>
                    <p>
                        Quelle que soit l’occasion, imaginons une fête qui vous ressemble.
                    </p>
                </div>
                <div class="occasions">
                    <a href="contact.php?evenement=<?= e(rawurlencode('Mariage')) ?>">
                        <span aria-hidden="true">
                            ♡
                        </span>
                        Mariages
                    </a>
                    <a href="contact.php?evenement=<?= e(rawurlencode('Baptême')) ?>">
                        <span aria-hidden="true">
                            ✦
                        </span>
                        Baptêmes
                    </a>
                    <a href="contact.php?evenement=<?= e(rawurlencode('Anniversaire')) ?>">
                        <span aria-hidden="true">
                            ♨
                        </span>
                        Anniversaires
                    </a>
                    <a href="contact.php?evenement=<?= e(rawurlencode('Séminaire d’entreprise')) ?>">
                        <span aria-hidden="true">
                            ▣
                        </span>
                        Séminaires d’entreprise
                    </a>
                    <a href="contact.php?evenement=<?= e(rawurlencode('Fête de village')) ?>">
                        <span aria-hidden="true">
                            ⚑
                        </span>
                        Fêtes de village
                    </a>
                    <a href="contact.php?evenement=<?= e(rawurlencode('Fête privée')) ?>">
                        <span aria-hidden="true">
                            ✧
                        </span>
                        Fêtes privées
                    </a>
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
