<?php
function theme_custom_logo() {
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 300,
        'flex-width'  => true,
        'flex-height' => true,
    ]);
}
add_action('after_setup_theme', 'theme_custom_logo');
