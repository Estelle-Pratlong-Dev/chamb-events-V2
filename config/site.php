<?php

// Coordonnées et présentation : à modifier uniquement dans ce fichier.
return [
    'name' => 'CHAMB-EVENTS',
    'description' => 'CHAMB-EVENTS est une entreprise spécialisée dans la location d’animations, de jeux, de châteaux et structures gonflables, de manèges, de stands et d’amusements.',
    'location_description' => 'Implantés en Occitanie depuis plusieurs années, nous répondons à toutes vos demandes d’animation.',
    'phone' => '06 17 48 58 13',
    'email' => 'chamb-events@gmail.com',
    // Création du site : crédit affiché dans le footer et les mentions légales.
    'creator' => [
        'name' => 'Estelle Pratlong',
        'label' => 'estelle-pratlong',
        'url' => 'https://dev.estelle-pratlong.fr/',
    ],

    // Éditeur : compléter avec les informations officielles de CHAMB-EVENTS.
    // Selon le statut, capital et TVA peuvent être non applicables : le préciser.
    'legal' => [
        'identity' => 'CHAMB EVENTS',
        'status' => 'SAS (société par actions simplifiée)',
        'address' => '440 chemin de la Bagnade, 30300 Beaucaire',
        'registration' => '932 012 669 RCS Nîmes',
        'capital' => '500 €',
        'vat' => 'FR21932012669',
        // Nom du représentant légal de CHAMB-EVENTS, et non de la développeuse.
        'publication_director' => 'Jérome Chambert',
    ],

    // Hébergeur prévu pour la mise en ligne PHP : IONOS.
    // Mettre à jour ces coordonnées en cas de migration.
    'hosting' => [
        'name' => 'IONOS SARL',
        'address' => '7 place de la Gare, BP 70109, 57200 Sarreguemines Cedex, France',
        'phone' => '09 70 80 89 11',
        'privacy_url' => 'https://www.ionos.fr/terms-gtc/clause-de-confidentialite/',
    ],

    // Aucun médiateur désigné à ce jour, selon les informations de l’entreprise.
    // Compléter le nom, l’adresse et le lien après adhésion à un dispositif.
    'mediator' => [
        'name' => '',
        'address' => '',
        'url' => '',
    ],

    // Pratiques réelles à confirmer : ne pas inventer une durée de conservation.
    'privacy' => [
        'contact_retention' => 'Durée de conservation des demandes reçues : à confirmer auprès de CHAMB-EVENTS.',
        'hosting_details' => 'Les modalités des journaux techniques (données, durée de conservation et éventuels transferts hors UE) doivent être précisées avec l’hébergeur.',
    ],

    // Avant mise en ligne : URL HTTPS définitive sans slash final, puis dev_mode à false.
    // Laisser vide sur les versions de travail pour ne pas annoncer un faux domaine.
    'url' => 'https://chamb-events.estelle-pratlong.fr',
    'dev_mode' => false,
    'asset_version' => '20261004-cards',
];
