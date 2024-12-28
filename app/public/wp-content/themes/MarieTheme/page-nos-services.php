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

// Récupère tous les champs ACF d'un coup
$context['acf'] = get_fields($post->ID);
// Récupérer les services (CPT) - ajuster le nombre selon tes besoins
$args = [
    'post_type' => 'service',
    'posts_per_page' => 6,  // Limiter à 6 services
];

$context['services'] = Timber::get_posts($args);
// Rendre le template Twig approprié
Timber::render( 'page-nos-services.twig', $context );
