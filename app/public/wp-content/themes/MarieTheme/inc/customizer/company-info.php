<?php
function company_info_customizer_settings($wp_customize) {
    $wp_customize->add_section('company_info_section', [
        'title'    => __('Informations de l\'entreprise', 'theme-textdomain'),
        'priority' => 120,
    ]);

    // Téléphone
    $wp_customize->add_setting('company_phone', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('company_phone', [
        'label'   => __('Téléphone', 'theme-textdomain'),
        'section' => 'company_info_section',
        'type'    => 'text',
    ]);

    // Email
    $wp_customize->add_setting('company_email', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ]);
    $wp_customize->add_control('company_email', [
        'label'   => __('Email', 'theme-textdomain'),
        'section' => 'company_info_section',
        'type'    => 'email',
    ]);

    // Adresse (WYSIWYG)
    $wp_customize->add_setting('company_address', [
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post', // Permet HTML sécurisé
    ]);
    $wp_customize->add_control('company_address', [
        'label'   => __('Adresse', 'theme-textdomain'),
        'section' => 'company_info_section',
        'type'    => 'textarea',
    ]);

    // Horaires (WYSIWYG)
    $wp_customize->add_setting('company_hours', [
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post', // Permet HTML sécurisé
    ]);
    $wp_customize->add_control('company_hours', [
        'label'   => __('Horaires', 'theme-textdomain'),
        'section' => 'company_info_section',
        'type'    => 'textarea',
    ]);
}
add_action('customize_register', 'company_info_customizer_settings');
