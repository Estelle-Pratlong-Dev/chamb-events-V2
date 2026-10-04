<?php

// Accessible à /robots.txt grâce à la règle Apache du projet.
$site = require __DIR__ . '/config/site.php';
header('Content-Type: text/plain; charset=utf-8');

// Laisser les robots lire les pages et leurs éventuelles balises noindex.
echo "User-agent: *\nAllow: /\n";
if (!$site['dev_mode'] && $site['url'] !== '') {
    echo "Sitemap: " . rtrim($site['url'], '/') . "/sitemap.xml\n";
}
