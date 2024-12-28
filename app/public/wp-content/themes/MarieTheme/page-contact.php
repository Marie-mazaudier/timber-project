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

// Rendre le template Twig approprié
Timber::render( 'page-contact.twig', $context );
