<?php
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
