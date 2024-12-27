<?php
function theme_setup() {
    // Ajouter le support des menus
    register_nav_menus([
        'main-menu' => __('Menu Principal'),
        'footer-menu' => __('Menu Pied de page'),
    ]);

    // Ajouter le support du logo
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 300,
        'flex-width'  => true,
        'flex-height' => true,
    ]);
}
// Ajouter les scripts et les styles    
function theme_enqueue_scripts() {
    wp_enqueue_script(
        'sticky-menu', 
        get_template_directory_uri() . '/assets/js/stickyMenu.js', 
        [], 
        null, 
        true // true = charge dans le footer
    );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

// Ajouter des options dans le Customizer
function footer_customizer_settings($wp_customize) {
    // Section Footer
    $wp_customize->add_section('footer_section', [
        'title'       => __('Footer', 'theme-textdomain'),
        'priority'    => 130,
    ]);

    // Champ Copyright
    $wp_customize->add_setting('footer_copyright', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('footer_copyright', [
        'label'    => __('Texte du copyright', 'theme-textdomain'),
        'section'  => 'footer_section',
        'type'     => 'text',
    ]);
     // Champ texte SEO
     $wp_customize->add_setting('footer_seo', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('footer_seo', [
        'label'    => __('Texte SEO', 'theme-textdomain'),
        'section'  => 'footer_section',
        'type'     => 'text',
    ]);

  // Réalisation - Texte
  $wp_customize->add_setting('footer_realisation_text', [
    'default'           => '',
    'sanitize_callback' => 'sanitize_text_field',
]);
$wp_customize->add_control('footer_realisation_text', [
    'label'    => __('Texte Réalisation', 'theme-textdomain'),
    'section'  => 'footer_section',
    'type'     => 'text',
]);

// Réalisation - Lien URL
$wp_customize->add_setting('footer_realisation_link', [
    'default'           => '',
    'sanitize_callback' => 'esc_url_raw',
]);
$wp_customize->add_control('footer_realisation_link', [
    'label'    => __('Lien Réalisation', 'theme-textdomain'),
    'section'  => 'footer_section',
    'type'     => 'url',
]);

// Mentions légales - Texte
$wp_customize->add_setting('footer_legal_text', [
    'default'           => '',
    'sanitize_callback' => 'sanitize_text_field',
]);
$wp_customize->add_control('footer_legal_text', [
    'label'    => __('Texte Mentions Légales', 'theme-textdomain'),
    'section'  => 'footer_section',
    'type'     => 'text',
]);

// Mentions légales - Lien URL
$wp_customize->add_setting('footer_legal_link', [
    'default'           => '',
    'sanitize_callback' => 'esc_url_raw',
]);
$wp_customize->add_control('footer_legal_link', [
    'label'    => __('Lien Mentions Légales', 'theme-textdomain'),
    'section'  => 'footer_section',
    'type'     => 'url',
]);
}
add_action('customize_register', 'footer_customizer_settings');

////// Ajouter les éléments au contexte Timber et les rendre accessibles dans les templates  //////
function add_to_context($context) {
    $context['menu'] = Timber::get_menu('principal');  // Nom du menu dans l'admin
    
    // Récupérer le logo et l'ajouter au contexte
    $custom_logo_id = get_theme_mod('custom_logo');
    $context['logo'] = $custom_logo_id ? wp_get_attachment_image_url($custom_logo_id, 'full') : '';
    // Récupération des valeurs du Customizer
    $context['footer_copyright'] = get_theme_mod('footer_copyright');
   // Réalisation - Texte + Lien
   $context['footer_realisation_text'] = get_theme_mod('footer_realisation_text');
   $context['footer_realisation_link'] = get_theme_mod('footer_realisation_link');  
   // Mentions légales - Texte + Lien
   $context['footer_legal_text'] = get_theme_mod('footer_legal_text');
   $context['footer_legal_link'] = get_theme_mod('footer_legal_link');
   
    $context['footer_seo'] = get_theme_mod('footer_seo');

    return $context;
}

add_action('after_setup_theme', 'theme_setup');
add_filter('timber/context', 'add_to_context');

