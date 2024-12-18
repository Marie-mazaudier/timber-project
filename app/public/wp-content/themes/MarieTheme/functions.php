<?php
// Charger les styles et scripts
function marie_theme_enqueue_styles() {
    wp_enqueue_style('test-css', '/wp-content/themes/MarieTheme/assets/css/reset.css');
    wp_enqueue_script('test-js', '/wp-content/themes/MarieTheme/assets/js/script.js', array(), null, true);
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
Timber::$dirname = ['templates'];
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
