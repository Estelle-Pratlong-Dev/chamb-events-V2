<?php

declare(strict_types=1);

// ====================== COORDONNÉES COMMUNES =======================

// Prépare $site pour les pages, le header et le footer.
// Les valeurs se modifient uniquement dans config/site.php.
$site = require __DIR__ . '/../config/site.php';

// Calcule le lien d’appel depuis le téléphone affiché.
$phoneDigits = preg_replace('/[^0-9]/', '', $site['phone']);
if (str_starts_with($phoneDigits, '0')) {
    $site['phone_uri'] = '+33' . substr($phoneDigits, 1);
} else {
    $site['phone_uri'] = '+' . $phoneDigits;
}

// ====================== FONCTIONS COMMUNES =========================

// Protège un texte ou une valeur d’attribut inséré dans le HTML.
function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

// Les pages passent explicitement leur clé aux liens du header et du footer.
function is_current(string $key, string $pageKey): string
{
    if ($key === $pageKey) {
        return ' aria-current="page"';
    }

    return '';
}
