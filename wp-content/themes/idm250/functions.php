<?php

function theme_scripts_and_styles() {

    wp_enqueue_style(
        'idm250-styles', 
        get_template_directory_uri() . '/dist/styles/main.css', 
        [], 
        filemtime(get_template_directory() . '/dist/styles/main.css'), 
        'all'
    );

    wp_enqueue_script(
        'idm250-scripts',
        get_template_directory_uri() . '/dist/scripts/main.js',
        [],
        filemtime(get_template_directory() . '/dist/scripts/main.js'),
        true
    );

}

add_action('wp_enqueue_scripts', 'theme_scripts_and_styles');

?>