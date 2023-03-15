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

    function my_acf_json_save_point($path)
    {
        $acf_directory = "/acf";

        // update path
        $path = get_stylesheet_directory() . $acf_directory;

        // return
        return $path;
    }
    add_filter('acf/settings/save_json', 'my_acf_json_save_point');


    function my_acf_json_load_point( $paths ) {

        $acf_directory = "/acf";
        
        // remove original path (optional)
        unset($paths[0]);
        
        
        // append path
        $paths[] = get_stylesheet_directory() . $acf_directory;
        
        
        // return
        return $paths;
        
    }
    add_filter('acf/settings/load_json', 'my_acf_json_load_point');

    add_action('acf/init', 'my_acf_init');
    function my_acf_init() {
        
        // check function exists
        if( function_exists('acf_register_block') ) {
            
            // register a testimonial block
            acf_register_block(array(
                'name'              => 'one-col-hero',
                'title'             => __('Header With Background Text'),
                'description'       => __('A custom hedaer block with background text.'),
                'render_callback'   => 'my_acf_block_render_callback',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'background', 'text', 'header' ),
            ));
        }
    }

    function my_acf_block_render_callback($block)
{
    // ['acf/logo-cloud']
    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);
    // $slug = 'logo-cloud';
    $block_directory = '/blocks';

    // include a template part from within the "blocks/{name-of-block.php}"
    if (file_exists(get_theme_file_path("{$block_directory}/{$slug}.php"))) {
        include get_theme_file_path("{$block_directory}/{$slug}.php");
    }
}

?>