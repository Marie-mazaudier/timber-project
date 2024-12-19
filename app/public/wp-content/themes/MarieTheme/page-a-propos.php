<?php
// Vérifier que Timber est disponible
if ( ! class_exists( 'Timber' ) ) {
    echo 'Timber n’est pas installé ou activé.';
    return;
}

// Charger le contexte de Timber
$context = Timber::context();

// Récupérer le post actuel
$context['post'] = Timber::get_post();

// Récupérer les champs ACF spécifiques
$context['titre'] = get_field('titre');
$context['description'] = get_field('description');
$context['image'] = get_field('image');

// Rendre le template Twig approprié
Timber::render( 'page-a-propos.twig', $context );
