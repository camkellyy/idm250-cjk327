<footer>
    <p class="footer-bg-text">ECHO KID</p>
    <p>ECHO KID <span>&copy;</span></p>
    <?php wp_nav_menu(['theme_location' => 'footer-menu']); ?>
    <div class="social-media-footer">
        <a href="<?php echo site_url()?>"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/instagram-light.svg" alt="Instagram"></a>
        <a href="<?php echo site_url()?>"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/spotify-light.svg" alt="Spotify"></a>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>