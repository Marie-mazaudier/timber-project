<?php

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


