<?php
require_once __DIR__ . '/vendor/autoload.php';

if (class_exists('Timber')) {
    echo 'Timber est chargé correctement.';
} else {
    echo 'Timber n’est pas chargé.';
}
