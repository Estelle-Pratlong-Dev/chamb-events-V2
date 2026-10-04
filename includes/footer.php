<?php
// Variables attendues :
// $site : coordonnées chargées par includes/bootstrap.php.
// $images : chemins chargés par la page depuis config/images.php.
// $pageKey : clé définie explicitement au début de la page.
?>

<!-- ================== PIED DE PAGE ================== -->

<footer class="site-footer">
    <!-- Logo, navigation et coordonnées -->
    <div class="wrap footer-content">
        <a class="logo" href="index.php" aria-label="CHAMB EVENTS — Retour à l’accueil">
            <img src="<?= e($images['logo_chamb_events']) ?>" alt="CHAMB EVENTS — Manèges, gonflables, événements" width="1536" height="1024">
        </a>
        <div class="footer-navigation">
            <h2>Découvrir</h2>
            <nav aria-label="Navigation de pied de page">
                <a href="index.php"<?= is_current('home', $pageKey) ?>>Accueil</a>
                <a href="nos-locations.php"<?= is_current('locations', $pageKey) ?>>Nos locations</a>
                <a href="galerie.php"<?= is_current('gallery', $pageKey) ?>>Galerie photo</a>
                <a href="a-propos.php"<?= is_current('about', $pageKey) ?>>À propos</a>
                <a href="contact.php"<?= is_current('contact', $pageKey) ?>>Contact</a>
            </nav>
        </div>
        <div class="footer-contact">
            <h2>Parlons de votre événement</h2>
            <address class="contact-details">
                <a href="tel:<?= e($site['phone_uri']) ?>"><?= e($site['phone']) ?></a>
                <a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a>
            </address>
        </div>
    </div>

    <!-- Mentions et crédit de réalisation -->
    <div class="wrap footer-bottom">
        <span>© <?= date('Y') ?> <?= e($site['name']) ?></span>
        <nav aria-label="Informations légales">
            <a href="mentions-legales.php">Mentions légales</a>
            <a href="confidentialite.php">Politique de confidentialité</a>
        </nav>
        <span>
            Site réalisé par
            <a href="<?= e($site['creator']['url']) ?>"><?= e($site['creator']['label']) ?></a>
        </span>
    </div>
</footer>
