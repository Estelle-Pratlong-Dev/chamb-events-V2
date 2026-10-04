<?php

// Préparation commune et images utilisées par le header et le footer.
require __DIR__ . '/includes/bootstrap.php';
$images = require __DIR__ . '/config/images.php';
$pageKey = 'privacy';
?>
<!doctype html>
<html lang="fr">
    <!-- ====================== MÉTADONNÉES ET STYLES ===================== -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Politique de confidentialité — CHAMB-EVENTS.">
        <?php if ($site['dev_mode']): ?>
            <meta name="robots" content="noindex, nofollow">
        <?php endif; ?>
        <title>Politique de confidentialité — CHAMB-EVENTS</title>
        <?php if (!$site['dev_mode'] && $site['url'] !== ''): ?>
            <link rel="canonical" href="<?= e(rtrim($site['url'], '/') . '/confidentialite.php') ?>">
        <?php endif; ?>
        <link rel="icon" type="image/png" href="<?= e($images['favicon']) ?>">
        <link rel="stylesheet" href="css/styles.css?v=<?= e($site['asset_version']) ?>">
        <link rel="stylesheet" href="css/legal.css?v=<?= e($site['asset_version']) ?>">
    </head>
    <body class="page-privacy">
        <a class="skip" href="#main">Aller au contenu</a>
        <?php require __DIR__ . '/includes/header.php'; ?>
        <main id="main">
            <!-- =========================== TITRE =========================== -->
            <section class="page-hero page-hero-compact wrap">
                <div>
                    <h1>Politique de confidentialité</h1>
                </div>
            </section>

            <!-- ======================== INFORMATIONS ======================= -->
            <section class="legal-content wrap section">
                <h2>Responsable du traitement et contact</h2>
                <p>L’éditeur du site est CHAMB-EVENTS. Son identité juridique et son adresse figurent dans les <a href="mentions-legales.php">mentions légales</a>.</p>
                <p>Pour toute question concernant vos données : <a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a>.</p>

                <h2>Formulaire et messagerie</h2>
                <p>Le formulaire permet de préparer votre projet : coordonnées, lieu et date de l’événement, animations et message. Ces informations servent à préparer un message dans votre messagerie. Aucun envoi au serveur du site n’est effectué par ce formulaire.</p>
                <p>Le bouton « Ouvrir ma messagerie » transmet les champs saisis à votre application ou service de messagerie pour préremplir un courriel à CHAMB-EVENTS. Vous pouvez le relire, le modifier et décider de l’envoyer ou non. Votre messagerie peut conserver un brouillon selon ses réglages ; sa politique de confidentialité s’applique. Le site ne conserve pas ces champs dans des cookies ni dans le stockage local du navigateur.</p>

                <h2>Si vous contactez CHAMB-EVENTS</h2>
                <p>Lorsque vous envoyez une demande depuis votre messagerie ou contactez l’entreprise par téléphone, vos coordonnées et les renseignements utiles à votre événement sont utilisés pour répondre à votre demande et préparer un devis. Pour une demande de devis, la base juridique est l’exécution de mesures précontractuelles à votre initiative.</p>
                <p>Ces informations sont destinées aux personnes de CHAMB-EVENTS chargées des demandes et, pour l’acheminement des courriels, au prestataire de messagerie utilisé. Fournir les informations nécessaires à votre demande permet à l’entreprise de vous répondre ; les autres renseignements sont facultatifs.</p>
                <p><?= e($site['privacy']['contact_retention']) ?></p>

                <h2>Navigation et hébergement</h2>
                <p>Le code du site n’intègre ni outil de mesure d’audience, ni publicité, ni bouton de réseau social incorporé. Les polices et images sont chargées depuis le site.</p>
                <p>L’accès au site implique des échanges techniques avec l’hébergeur, notamment l’adresse IP et les requêtes nécessaires à l’affichage. La plateforme d’hébergement peut également utiliser ses propres mécanismes d’accès ou de sécurité.</p>
                <p><?= e($site['privacy']['hosting_details']) ?></p>
                <?php if ($site['hosting']['privacy_url'] !== ''): ?>
                    <p><a href="<?= e($site['hosting']['privacy_url']) ?>">Informations de confidentialité de l’hébergeur</a></p>
                <?php endif; ?>

                <h2>Cookies et traceurs</h2>
                <p>Le code applicatif de ce site ne dépose pas de cookie publicitaire ou de suivi. Il ne demande donc pas de consentement pour ces usages. Les éventuels cookies nécessaires à l’accès ou à la sécurité de la plateforme relèvent de l’hébergeur. Tout ajout futur d’un outil de suivi nécessitera une mise à jour de cette information et, lorsqu’il est requis, un recueil préalable du consentement.</p>

                <h2>Vos droits</h2>
                <p>Pour les données reçues par CHAMB-EVENTS, vous pouvez demander l’accès, la rectification, l’effacement ou la limitation du traitement et, selon le traitement et les conditions légales, la portabilité ou exercer un droit d’opposition. Adressez votre demande à l’adresse de contact indiquée ci-dessus.</p>
                <p>Vous pouvez également adresser une réclamation à la <a href="https://www.cnil.fr/fr/adresser-une-plainte">CNIL</a>.</p>

                <h2>Liens externes</h2>
                <p>Lorsque vous suivez un lien vers un autre site, les règles de confidentialité de ce site s’appliquent à votre navigation.</p>
            </section>
        </main>
        <?php require __DIR__ . '/includes/footer.php'; ?>
        <script src="js/script.js?v=<?= e($site['asset_version']) ?>"></script>
    </body>
</html>
