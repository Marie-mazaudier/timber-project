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
// Récupérer les champs ACF spécifiques
$context['banner_image'] = get_field('banner_image');
$context['titre_page'] = get_field('titre_page');
$context['description_entreprise'] = get_field('description_entreprise');
$context['link_to_about'] = get_permalink(11);
$context['titre_section'] = get_field('titre_section');
$context['sous_titre_section'] = get_field('sous_titre_section');
$context['description_section'] = get_field('description_section');
// Récupérer les services (CPT) - ajuster le nombre selon tes besoins
$args = [
    'post_type' => 'service',
    'posts_per_page' => 6,  // Limiter à 6 services
];

$context['services'] = Timber::get_posts($args);
// Récupérer le contenu de la page
$context['post'] = Timber::get_post(); // Récupère la page actuelle

// Charger le template Twig
Timber::render('front-page.twig', $context);
