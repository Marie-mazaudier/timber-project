<?php
function register_theme_menus() {
    register_nav_menus([
        'main-menu'   => __('Menu Principal', 'theme-textdomain'),
        'footer-menu' => __('Menu Pied de page', 'theme-textdomain'),
    ]);
}
add_action('after_setup_theme', 'register_theme_menus');
