<?php get_header('light'); ?>

<div class="home-bg-img" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>

<div class="two-col-hero-container">

    <div class="two-col-hero-left-container">
            
        <h1 class="title"><?php the_field('two-col-hero-title-home');?></h1>

        <p class="two-col-bg-text-home"><?php the_field('two-col-hero-bg-home');?></p>
        <p class="two-col-hero-description"><?php the_field('two-col-hero-description-home');?></p>

        <?php 
        $link = get_field('two-col-hero-link-home');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        <?php endif; ?>

    </div>

    <?php 
    $image = get_field('two-col-hero-image-home');
    if( !empty( $image ) ): ?>
        <img class="two-col-hero-image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    <?php endif; ?>

</div>

<?php 
$image = get_field('concert-background-image');
if( !empty( $image ) ): ?>
    <div class="album-song-container" style="background-image: url('<?php echo esc_url($image['url']); ?>')">
<?php endif; ?>
<h1 class="concert-title"><?php the_field('concert-info-title'); ?></h1>

<?php 
$img = get_template_directory_uri();
$rows = get_field('show-info');
if( $rows ) {
    echo '<div class="concerts-songs-row">';
    foreach( $rows as $row ) {
        $month = $row['show-month'];
        $day = $row['show-day-date'];
        $location = $row['show-location'];
        $link = $row['show-ticket-link'];

        echo "
        <div class='concert-row'>
            <div class='concert-section-1'>
                <p>$month</p>
                <p class='big-text'>$day</p>
            </div>
            <div class='concert-section-2'>
                <p>$location</p>
            </div>
            <div class='concert-section-3'>
                <a class='song-player light-button' href='{$link['url']}' target='{$link['target']}'>{$link['title']}</a>
            </div>
        </div>
        <hr class='concert-hr'>
        ";

        echo "
        <div class='concert-row-mobile'>
            <div class='concert-section-1-mobile'>
                <div class='date'>
                    <p>$month</p>
                    <p class='big-text'>$day</p>
                </div>
                <div class='circle'></div>
                <p>$location</p>
            </div>
            <div class='concert-section-2-mobile'>
                <a class='song-player light-button' href='{$link['url']}' target='{$link['target']}'>{$link['title']}</a>
            </div>
            <hr class='concert-hr-mobile'>
        </div>
        ";
    }
    echo '</div>';
}

?>
</div>


<?php 
get_template_part('components/recent-projects');
?>

<?php get_footer();?>