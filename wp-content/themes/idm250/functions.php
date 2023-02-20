<?php

function theme_scripts_and_styles() {

    // Load CSS Reset
    wp_enqueue_style(
        'css-reset',
        'https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css',
        [],
        null
    );

    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter&display=swap',
        [],
        null
    );
    
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

    add_theme_support('post-thumbnails');
    add_post_type_support('page', 'excerpt');

    function register_theme_menus() {
        register_nav_menus(
            [
                'primary-menu' => "Primary Menu",
                'footer-menu' => 'Footer Menu'
            ]
        );
    }

    add_action('init', 'register_theme_menus');

    

?>