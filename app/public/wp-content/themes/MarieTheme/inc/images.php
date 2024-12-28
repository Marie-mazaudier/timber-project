<?php
//Ajouter  tailles d'images pour toutes les tailles d'écrans
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
add_image_size('small', 480, 320, true);  // Taille mobile
add_image_size('medium', 768, 480, true); // Taille tablette
add_image_size('large', 1200, 800, true); // Taille desktop

// Permet d'ajouter ces tailles aux champs ACF
add_filter('image_size_names_choose', function($sizes) {
    return array_merge($sizes, [
        'small' => __('Small'),
        'medium' => __('Medium'),
        'large' => __('Large')
    ]);
});