<?php

// Préparation commune et images utilisées par le header et le footer.
require __DIR__ . '/includes/bootstrap.php';
$images = require __DIR__ . '/config/images.php';
$pageKey = 'legal';
?>
<!doctype html>
<html lang="fr">
    <!-- ====================== MÉTADONNÉES ET STYLES ===================== -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Mentions légales — CHAMB-EVENTS.">
        <?php if ($site['dev_mode']): ?>
            <meta name="robots" content="noindex, nofollow">
        <?php endif; ?>
        <title>Mentions légales — CHAMB-EVENTS</title>
        <?php if (!$site['dev_mode'] && $site['url'] !== ''): ?>
            <link rel="canonical" href="<?= e(rtrim($site['url'], '/') . '/mentions-legales.php') ?>">
        <?php endif; ?>
        <link rel="icon" type="image/png" href="<?= e($images['favicon']) ?>">
        <link rel="stylesheet" href="css/styles.css?v=<?= e($site['asset_version']) ?>">
        <link rel="stylesheet" href="css/legal.css?v=<?= e($site['asset_version']) ?>">
    </head>
    <body class="page-legal">
        <a class="skip" href="#main">Aller au contenu</a>
        <?php require __DIR__ . '/includes/header.php'; ?>
        <main id="main">
            <!-- =========================== TITRE =========================== -->
            <section class="page-hero page-hero-compact wrap">
                <div>
                    <h1>Mentions légales</h1>
                </div>
            </section>

            <!-- ======================== INFORMATIONS ======================= -->
            <section class="legal-content wrap section">
                <h2>Éditeur du site</h2>
                <dl>
                    <dt>Nom commercial</dt><dd><?= e($site['name']) ?></dd>
                    <dt>Identité / dénomination sociale</dt><dd><?= e($site['legal']['identity']) ?></dd>
                    <dt>Statut / forme juridique</dt><dd><?= e($site['legal']['status']) ?></dd>
                    <dt>Adresse</dt><dd><?= e($site['legal']['address']) ?></dd>
                    <dt>Immatriculation (SIREN et RCS, selon le statut)</dt><dd><?= e($site['legal']['registration']) ?></dd>
                    <dt>Capital social</dt><dd><?= e($site['legal']['capital']) ?></dd>
                    <dt>TVA intracommunautaire</dt><dd><?= e($site['legal']['vat']) ?></dd>
                    <dt>Directeur de la publication</dt><dd><?= e($site['legal']['publication_director']) ?></dd>
                </dl>
                <p>Contact : <a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a> — <a href="tel:<?= e($site['phone_uri']) ?>"><?= e($site['phone']) ?></a>.</p>

                <h2>Hébergement</h2>
                <dl>
                    <dt>Hébergeur</dt><dd><?= e($site['hosting']['name']) ?></dd>
                    <dt>Adresse</dt><dd><?= e($site['hosting']['address']) ?></dd>
                    <dt>Téléphone</dt><dd><?= e($site['hosting']['phone']) ?></dd>
                </dl>
                <?php if ($site['hosting']['privacy_url'] !== ''): ?>
                    <p><a href="<?= e($site['hosting']['privacy_url']) ?>">Politique de confidentialité de l’hébergeur</a></p>
                <?php endif; ?>

                <h2>Conception et réalisation</h2>
                <p>Site réalisé par <a href="<?= e($site['creator']['url']) ?>"><?= e($site['creator']['name']) ?></a>.</p>

                <h2>Propriété intellectuelle</h2>
                <p>Les textes, photographies, illustrations, logos, marques et personnages restent soumis aux droits de leurs titulaires respectifs. Leur présence sur le site n’accorde aucun droit de réutilisation. Toute reproduction nécessite l’autorisation du titulaire concerné. Le code du site est soumis à la licence fournie avec le projet.</p>

                <h2>Informations et demandes de location</h2>
                <p>Ce site présente les animations de CHAMB-EVENTS. Il ne permet ni commande ni paiement en ligne. La disponibilité, les conditions de location et le prix sont confirmés par l’entreprise lors de votre demande. L’ouverture d’un message prérempli ne constitue ni une réservation ni un envoi : vous devez envoyer le courriel depuis votre messagerie.</p>

                <h2>Médiation de la consommation</h2>
                <?php if ($site['mediator']['name'] !== ''): ?>
                    <p>Pour une prestation destinée à un particulier, après une réclamation écrite auprès de CHAMB-EVENTS restée sans solution, le consommateur peut recourir gratuitement au médiateur compétent, selon ses conditions de saisine.</p>
                    <p>Médiateur : <?= e($site['mediator']['name']) ?>. Adresse : <?= e($site['mediator']['address']) ?>.</p>
                    <?php if ($site['mediator']['url'] !== ''): ?>
                        <p><a href="<?= e($site['mediator']['url']) ?>">Site du médiateur et modalités de saisine</a></p>
                    <?php endif; ?>
                <?php else: ?>
                    <p>CHAMB EVENTS n’a pas encore désigné de médiateur de la consommation. Les coordonnées du dispositif seront publiées après sa désignation. Pour une réclamation, contactez l’entreprise aux coordonnées indiquées ci-dessus.</p>
                <?php endif; ?>

                <h2>Données personnelles</h2>
                <p>Consultez la <a href="confidentialite.php">politique de confidentialité</a> pour le fonctionnement du formulaire et les informations relatives à vos données.</p>
            </section>
        </main>
        <?php require __DIR__ . '/includes/footer.php'; ?>
        <script src="js/script.js?v=<?= e($site['asset_version']) ?>"></script>
    </body>
</html>
