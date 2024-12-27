<?php
// Charger les styles et scripts
function marie_theme_enqueue_styles() {
    // Enfile le fichier CSS principal du thème
    wp_enqueue_style(
        'marie-theme-styles',
        get_template_directory_uri() . '/assets/css/style-main.css',
        array(),
        filemtime(get_template_directory() . '/assets/css/style-main.css')
    );

    // Enfile le script JavaScript principal
    wp_enqueue_script(
        'marie-theme-scripts',
        get_template_directory_uri() . '/assets/js/script.js',
        array(),
        filemtime(get_template_directory() . '/assets/js/script.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'marie_theme_enqueue_styles');

// Charger Composer Autoload
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
    error_log('autoload.php chargé.');
} else {
    error_log('Le fichier autoload.php est manquant.');
}

// Vérifier que Timber est installé
if (class_exists('Timber\Timber')) {
    error_log('Timber est chargé correctement.');
    Timber\Timber::init();
} else {
    error_log('Timber n’est pas chargé.');
    echo '<pre>Timber n’est pas chargé.</pre>';
    die();
}

// Configurer Timber pour le dossier "templates"
Timber::$dirname = ['templates', 'templates/partials'];

// Initialiser Timber pour le thème
class MarieTheme extends Timber\Site {
    public function __construct() {
        add_action('after_setup_theme', [$this, 'theme_supports']);
        parent::__construct();
    }

    public function theme_supports() {
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
    }
}

new MarieTheme();


add_filter('template_include', function($template) {
    if (is_home() && !is_front_page()) {
        return get_template_directory() . '/archive.php';
    }
    return $template;
});

require_once get_template_directory() . '/inc/setup.php';
