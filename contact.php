<?php

// Coordonnées et fonctions communes : préparées par le bootstrap.
require __DIR__ . '/includes/bootstrap.php';

// Images communes : chemins définis dans config/images.php.
$images = require __DIR__ . '/config/images.php';

// Clé explicite utilisée par le header et le footer pour le lien actif.
$pageKey = 'contact';

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
        <meta name="description" content="Contactez CHAMB-EVENTS et préparez votre demande de devis pour un mariage, anniversaire, événement d’entreprise ou fête de village.">
        <?php if ($site['dev_mode']): ?>
            <meta name="robots" content="noindex, nofollow">
        <?php endif; ?>
        <title>Contact et devis — CHAMB-EVENTS</title>
        <?php if (!$site['dev_mode'] && $site['url'] !== ''): ?>
            <link rel="canonical" href="<?= e(rtrim($site['url'], '/') . '/contact.php') ?>">
        <?php endif; ?>
        <link rel="icon" type="image/png" href="<?= e($images['favicon']) ?>">
        <link rel="stylesheet" href="css/styles.css?v=<?= e($site['asset_version']) ?>">
        <link rel="stylesheet" href="css/contact.css?v=<?= e($site['asset_version']) ?>">
    </head>
    <body class="page-contact">
        <a class="skip" href="#main">
            Aller au contenu
        </a>
        <?php require __DIR__ . "/includes/header.php"; ?>
        <main id="main">
            <!-- =============================== HERO ============================= -->

            <section class="page-hero wrap">
                <div>
                    <span class="eyebrow">
                        VOTRE PROCHAINE FÊTE
                    </span>
                    <h1>
                        Parlons de votre événement !
                    </h1>
                    <p>
                        Une date, un lieu, une envie : préparons ensemble votre projet.
                    </p>
                </div>
                <figure class="hero-figure">
                    <img class="page-hero-image" src="<?= e($images['fete']) ?>" alt="Une ambiance joyeuse de fête foraine" fetchpriority="high">
                </figure>
            </section>

            <!-- ================== COORDONNÉES ET FORMULAIRE ================== -->

            <section id="contact" class="wrap section contact">
                <div>
                    <h2>
                        Préparez votre
                        <br>
                        demande de devis.
                    </h2>
                    <p>
                        Quelques informations suffisent pour poser les bases de votre événement.
                    </p>
                    <address class="contact-details">
                        <a href="tel:<?= e($site['phone_uri']) ?>">
                            <?= e($site['phone']) ?>
                        </a>
                        <a href="mailto:<?= e($site['email']) ?>">
                            <?= e($site['email']) ?>
                        </a>
                    </address>
                    <p class="note">
                        Vous pouvez nous appeler ou nous écrire directement. Le formulaire ci-contre ouvre votre messagerie avec une demande préremplie. Il vous reste à envoyer le message.
                    </p>
                </div>

                <!-- ================== PRÉPARATION DE LA DEMANDE ================== -->

                <form id="quote" data-email="<?= e($site['email']) ?>">
                    <div class="form-grid">
                        <label>
                            Votre nom
                            <input name="Nom" required autocomplete="name">
                        </label>
                        <label>
                            Votre adresse e-mail
                            <input name="Email" type="email" required autocomplete="email">
                        </label>
                        <label>
                            Type d’événement
                            <select name="Événement" id="event">
                                <option>
                                    Mariage
                                </option>
                                <option>
                                    Baptême
                                </option>
                                <option>
                                    Anniversaire
                                </option>
                                <option>
                                    Séminaire d’entreprise
                                </option>
                                <option>
                                    Fête de village
                                </option>
                                <option>
                                    Fête privée
                                </option>
                                <option>
                                    Événement d’entreprise
                                </option>
                                <option>
                                    Autre événement
                                </option>
                            </select>
                        </label>
                        <label>
                            Date souhaitée
                            <input type="date" name="Date">
                        </label>
                        <label>
                            Lieu de l’événement
                            <input name="Lieu" placeholder="Ville, lieu ou adresse">
                        </label>
                    </div>

                    <!-- ================== CHOIX DES ANIMATIONS ================== -->

                    <fieldset class="animation-choices">
                        <legend>
                            Animations souhaitées
                        </legend>
                        <p>
                            Ouvrez une catégorie pour choisir vos animations. Vos choix sont conservés en passant à la suivante.
                        </p>
                        <?php
                            $categories = ['Manèges', 'Stands & jeux', 'Structures gonflables'];
                            foreach ($categories as $category):
                        ?>
                            <details name="animations">
                                <summary>
                                    <?= e($category) ?>
                                </summary>
                                <div class="checkbox-grid">
                                    <?php
                                        foreach ($locations as $location):
                                            if ($location['category'] !== $category) {
                                                continue;
                                            }
                                    ?>
                                        <label>
                                            <input type="checkbox" name="Animations[]" value="<?= e($location['title']) ?>">
                                            <span>
                                                <?= e($location['title']) ?>
                                            </span>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                            </details>
                        <?php endforeach; ?>
                        <details name="animations">
                            <summary>
                                Mascottes
                            </summary>
                            <div class="checkbox-grid">
                                <?php
                                    foreach ($universes as $universe):
                                        foreach ($universe['names'] as $name):
                                ?>
                                        <label>
                                            <input type="checkbox" name="Animations[]" value="Mascotte : <?= e($name) ?>">
                                            <span>
                                                <?= e($name) ?>
                                            </span>
                                        </label>
                                <?php
                                        endforeach;
                                    endforeach;
                                ?>
                            </div>
                        </details>
                        <p class="selection-summary" id="animation-selection" role="status" aria-live="polite">
                        </p>
                        <label class="help-choice">
                            <input type="checkbox" name="Animations[]" value="À définir ensemble">
                            <span>
                                J’aimerais être conseillé(e)
                            </span>
                        </label>
                    </fieldset>
                    <label>
                        Parlez-nous de votre projet
                        <textarea name="Projet" rows="3" placeholder="Nombre d’invités, âge des enfants, espace disponible…">
                        </textarea>
                    </label>
                    <button class="button" type="submit">
                        Ouvrir ma messagerie
                    </button>
                    <p id="form-status" role="status">
                    </p>
                    <p class="hint">
                        Votre messagerie doit être configurée sur cet appareil. Vous pourrez relire le message avant de l’envoyer.
                        <a href="confidentialite.php">En savoir plus sur vos données</a>.
                    </p>
                </form>
            </section>

            <!-- ================== QUESTIONS FRÉQUENTES ================== -->

            <section class="wrap faq section">
                <h2>
                    Avant de lancer les invitations
                </h2>
                <details>
                    <summary>
                        Comment connaître les disponibilités et les tarifs ?
                    </summary>
                    <p>
                        Les tarifs affichés sont des prix de départ HT. Le devis tient compte des animations choisies, de la distance, des conditions d’installation, de la durée de la prestation et des besoins de votre événement. Contactez-nous pour connaître les disponibilités et obtenir un devis personnalisé.
                    </p>
                </details>
                <details>
                    <summary>
                        Quelles informations prévoir pour l’installation ?
                    </summary>
                    <p>
                        Précisez les dimensions de l’espace, le type de sol, les accès et les possibilités d’alimentation électrique. Les contraintes propres à chaque animation doivent être confirmées avant la réservation.
                    </p>
                </details>
                <details>
                    <summary>
                        Et si la météo ne permet pas l’animation ?
                    </summary>
                    <p>
                        Les conditions d’utilisation et les modalités en cas de météo défavorable doivent être précisées dans le devis, notamment pour les structures gonflables.
                    </p>
                </details>
            </section>
        </main>
        <?php require __DIR__ . "/includes/footer.php"; ?>
        <!-- ============================== SCRIPTS ========================== -->

        <script src="js/script.js?v=<?= e($site['asset_version']) ?>"></script>
        <script src="js/contact.js?v=<?= e($site['asset_version']) ?>"></script>
    </body>
</html>
