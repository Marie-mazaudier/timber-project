<?php
// Ajouter les éléments du Customizer au contexte Timber
function add_to_context($context) {
    // Menus
    $context['menu'] = Timber::get_menu('principal');

    // Logo
    $custom_logo_id = get_theme_mod('custom_logo');
    $context['logo'] = $custom_logo_id ? wp_get_attachment_image_url($custom_logo_id, 'full') : '';

    // Footer - Copyright
    $context['footer_copyright'] = get_theme_mod('footer_copyright');
    
    // Réalisation - Texte + Lien
    $context['footer_realisation_text'] = get_theme_mod('footer_realisation_text');
    $context['footer_realisation_link'] = get_theme_mod('footer_realisation_link');
    
    // Mentions légales - Texte + Lien
    $context['footer_legal_text'] = get_theme_mod('footer_legal_text');
    $context['footer_legal_link'] = get_theme_mod('footer_legal_link');
    
    // SEO Footer
    $context['footer_seo'] = get_theme_mod('footer_seo');

    // Informations de l'entreprise
    $context['company_phone'] = get_theme_mod('company_phone');
    $context['company_email'] = get_theme_mod('company_email');
    $context['company_address'] = get_theme_mod('company_address');
    $context['company_hours'] = get_theme_mod('company_hours');

    return $context;
}
add_filter('timber/context', 'add_to_context');
