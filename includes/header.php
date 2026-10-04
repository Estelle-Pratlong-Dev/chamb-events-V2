<?php
// Variables attendues :
// $site : coordonnées chargées par includes/bootstrap.php.
// $images : chemins chargés par la page depuis config/images.php.
// $pageKey : clé définie explicitement au début de la page.
?>

<!-- ================== EN-TÊTE ET NAVIGATION ================== -->

<header>
    <a href="index.php" class="logo" aria-label="CHAMB EVENTS accueil">
        <img src="<?= e($images['logo_chamb_events']) ?>" alt="CHAMB EVENTS — Manèges, gonflables, événements" width="1536" height="1024">
    </a>
    <button type="button" aria-label="Ouvrir le menu" class="menu" aria-expanded="false" aria-controls="navigation">
        Menu ☰
    </button>
    <nav id="navigation" aria-label="Navigation principale">
        <a href="index.php"<?= is_current('home', $pageKey) ?>>
            Accueil
        </a>
        <a href="nos-locations.php"<?= is_current('locations', $pageKey) ?>>
            Nos locations
        </a>
        <a href="galerie.php"<?= is_current('gallery', $pageKey) ?>>
            Galerie photo
        </a>
        <a href="a-propos.php"<?= is_current('about', $pageKey) ?>>
            À propos
        </a>
        <a href="contact.php" class="button header-cta"<?= is_current('contact', $pageKey) ?>>
            Demander un devis
        </a>
    </nav>
</header>
