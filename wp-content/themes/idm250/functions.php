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
        'favicon',
        get_template_directory_uri() . '/dist/images/favicon.png',
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
                'primary-menu-left' => "Primary Menu Left",
                'primary-menu-right' => "Primary Menu Right",
                'footer-menu' => 'Footer Menu',
                'social-media-menu' => 'Social Media'
            ]
        );
    }

    add_action('init', 'register_theme_menus');


    function register_custom_post_types() {
    // Register Albums post type
        register_post_type('albums',
            [
                'labels' => [
                    'name' => __('Albums'),
                    'singular_name' => __('Album')
                ],
                'public' => true,
                'has_archive' => true,
                'rewrite' => ['slug' => 'albums'],
                'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
                'show_in_rest' => true,
            ]
        );

        register_post_type('concerts',
            [
                'labels' => [
                    'name' => __('Concerts'),
                    'singular_name' => __('Concert')
                ],
                'public' => true,
                'has_archive' => true,
                'rewrite' => ['slug' => 'concerts'],
                'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
                'show_in_rest' => true,
            ]
        );
    }

    add_action('init', 'register_custom_post_types');

    function get_theme_menu($menu_name) {

        // Get menu items as a flat array
        $locations = get_nav_menu_locations();
        // If menu doesn't exist, let's just return an empty array
        if (!isset($locations[$menu_name])) {
            return [];
        }
        $menu = wp_get_nav_menu_object($locations[$menu_name]);
        $menu_items = wp_get_nav_menu_items($menu->term_id, ['order' => 'DESC']);
        return $menu_items;
    }

?>