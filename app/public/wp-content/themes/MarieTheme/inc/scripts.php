<?php
function theme_enqueue_scripts() {
    //Chargement différé des scripts JS (true à la fin de wp_enqueue_script) : le script est chargé en fin de page
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', [], null, true);
    wp_enqueue_script('scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', ['gsap'], null, true);
    wp_enqueue_script('anim-js', get_template_directory_uri() . '/assets/js/anim.js', ['gsap', 'scrolltrigger'], filemtime(get_template_directory() . '/assets/js/anim.js'), true);
    wp_enqueue_script('stickyMenu-js', get_template_directory_uri() . '/assets/js/stickyMenu.js', [], filemtime(get_template_directory() . '/assets/js/stickyMenu.js'), true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

/*possibilité de charger conditionnellement un script JS en fonction de la page pour optimiser les performances*/