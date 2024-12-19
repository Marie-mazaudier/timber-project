<?php
// Vérifier que Timber est disponible
if (!class_exists('Timber')) {
    echo 'Timber n’est pas installé ou activé.';
    return;
}

// Charger le contexte pour Timber
$context = Timber::context();

// Charger l'article en cours
$context['post'] = Timber::get_post(); // Méthode correcte pour récupérer l'article actuel

// Rendre le template single.twig
Timber::render('single.twig', $context);
