<?php get_header('404'); ?>

<!-- <div class="four-oh-four" style="background-image: url('<?php echo get_template_directory_uri(); ?>/dist/images/404.png')">
    <div class="four-main">
        <hr>
        <p class="four-main-text" >404</p>
        <hr>
    </div>
</div> -->

<div class="four-container" style="background-image: url('<?php echo get_template_directory_uri(); ?>/dist/images/404.png')">
    <div class="four-big">
        <hr>
        <p class="four-big-text">404</p>
        <hr>
    </div>

    <div class="four-small">
        <p class="four-text">Page not found!</p>
        <button>BACK TO HOME</button>
    </div>
</div>

<?php get_footer('404'); ?>