<?php
// Vérifier que Timber est disponible
if (!class_exists('Timber')) {
    echo 'Timber n’est pas installé ou activé.';
    return;
}

// Charger le contexte et le passer au template Twig
$context = Timber::context();
Timber::render('index.twig', $context);
