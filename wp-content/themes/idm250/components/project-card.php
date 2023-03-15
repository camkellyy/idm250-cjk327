<article>
    <a href="<?php echo get_the_permalink(); ?>">
        <div class="card-container">
        <?php $image = get_field('recent-music-image');
        if( !empty( $image ) ): ?>
            <img src="<?php echo esc_url($image['url']); ?>">
        <?php endif; ?>
            <h5><?php the_field('recent-music-name'); ?></h5>
            <div class="recent-info">
                <p><?php the_field('recent-music-year'); ?></p>
                <div class='project-circle'></div>
                <p><?php the_field('recent-music-type'); ?></p>
            </div>
        </div>
    </a>
</article>