<?php
// Vérifier que Timber est disponible
if (!class_exists('Timber')) {
    echo 'Timber n’est pas installé ou activé.';
    return;
}

// Charger le contexte et le passer au template Twig
$context = Timber::context();

// Créer une instance WP_Query avec les paramètres
$wp_query = new WP_Query([
    'post_type' => 'post',       // Type d'article : articles par défaut
    'posts_per_page' => 5,       // Nombre d'articles à afficher
    'orderby' => 'date',         // Trier par date
    'order' => 'DESC'            // Ordre décroissant
    // 'category_name' => 'actualites',  // Nom de la catégorie (optionnel)
]);

// Passer WP_Query à Timber\PostQuery
$context['posts'] = new Timber\PostQuery($wp_query);

// Récupérer le contenu de la page
$context['post'] = Timber::get_post(); // Récupère la page actuelle

// Charger le template Twig
Timber::render('front-page.twig', $context);
