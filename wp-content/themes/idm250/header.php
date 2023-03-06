<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/dist/images/favicon.png">
    <title><?php echo get_the_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php 
    wp_body_open();
    ?>
    <div class="nav">
        <?php wp_nav_menu(['theme_location' => 'primary-menu-left']); ?>
        <a class="logo" href="<?php echo site_url()?>"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo.png" alt="Logo"></a>
        <div class="right-menu">
            <?php wp_nav_menu(['theme_location' => 'primary-menu-right']); ?>
            <div class="social-media">
                <a href="<?php echo site_url()?>"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/instagram-dark.svg" alt="Instagram"></a>
                <a href="<?php echo site_url()?>"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/spotify-dark.svg" alt="Spotify"></a>
            </div>
        </div>
    </div>

    <div class="mobile-nav-container">
        <div class="mobile-nav">
            <a class="logo-mobile" href="<?php echo site_url()?>"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo-mobile.png" alt="Logo Mobile"></a>
            <a href="javascript:void(0);" class="icon" onclick="openNav()"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/hamburger-dark.png" alt="Hamburger"></a>
        </div>
    </div>

    <div id="myNav" class="overlay">
        <div id="myLinks" class="drop-down-nav overlay-content">
            <div class="left-menu">
                <?php $menu = get_theme_menu('primary-menu-left'); ?>
                <?php foreach ($menu as $item) {
                    echo "<a href='{$item->url}'>{$item->title}</a>";
                }?>
            </div>

            <div class="right-menu-mobile">
                <?php $menu = get_theme_menu('primary-menu-right'); ?>
                <?php foreach ($menu as $item) {
                    echo "<a href='{$item->url}'>{$item->title}</a>";
                }?>
            </div>

            <div class="social-media">
                <a href="<?php echo site_url()?>"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/instagram-light.svg" alt="Instagram"></a>
                <a href="<?php echo site_url()?>"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/spotify-light.svg" alt="Spotify"></a>
            </div>

        </div>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    </div>

    <script>
        function openNav() {
        document.getElementById("myNav").style.width = "100%";
        }

        function closeNav() {
        document.getElementById("myNav").style.width = "0%";
        }
</script>