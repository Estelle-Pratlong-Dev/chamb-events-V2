<?php

// Accessible à /sitemap.xml : liste des pages utiles à l’indexation.
$site = require __DIR__ . '/config/site.php';
if ($site['dev_mode'] || $site['url'] === '') {
    http_response_code(503);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Sitemap disponible après configuration du domaine public.';
    exit;
}
header('Content-Type: application/xml; charset=utf-8');
$paths = ['/', '/nos-locations.php', '/a-propos.php', '/contact.php', '/galerie.php'];
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ($paths as $path) {
    $url = htmlspecialchars(rtrim($site['url'], '/') . $path, ENT_XML1 | ENT_QUOTES, 'UTF-8');
    echo '    <url><loc>' . $url . '</loc></url>' . "\n";
}
echo '</urlset>' . "\n";
