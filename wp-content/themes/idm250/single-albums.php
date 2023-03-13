<?php get_header();?>

<div class="two-col-hero-container">

    <div class="two-col-hero-left-container">
        
        <h1 class="title"><?php echo get_the_title(); ?></h1>

        <p class="two-col-bg-text"><?php the_field('two-col-bg-text');?></p>
        <p class="two-col-hero-description"><?php the_field('two-col-hero-description');?></p>

        <?php 
        $link = get_field('two-col-hero-link');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        <?php endif; ?>

    </div>

        <?php 
        $image = get_field('two-col-hero-image');
        if( !empty( $image ) ): ?>
            <img class="two-col-hero-image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
    
</div>

<?php 
$image = get_field('pull-quote-bg-image');
if( !empty( $image ) ): ?>
    <div class="pull-quote-container" style="background-image: url('<?php echo esc_url($image['url']); ?>')">
<?php endif; ?>
        <img class="block-quote-image" src="<?php echo get_template_directory_uri(); ?>/dist/images/pull-quote.png" alt="" />
        <p class="pull-quote"><?php the_field('pull-quote');?></p>
        <p class="pull-quote-citation"><?php the_field('pull-quote-citation');?></p>
    </div>

<div class="one-col-hero">
    <p class="one-col-bg-text"><?php the_field('one-col-bg-text');?></p>
    <h1 class="one-col-title"><?php the_field('one-col-title');?></h1>
    <p class="one-col-description"><?php the_field('one-col-description');?></p>
</div>

<?php get_template_part('components/content'); ?>


<div class="album-songs"><?php the_field('album-songs');?>
    

    <?php 
    $image = get_field('album-background-image');
    if( !empty( $image ) ): ?>
        <div class="album-song-container" style="background-image: url('<?php echo esc_url($image['url']); ?>')">
    <?php endif; ?>
    <h1><?php the_field('album-title'); ?></h1>


    <div class="album-songs-row-header">
        <div class="song-row">
            <div class="section-1">
                <p>#</p>
                <p class="song-bold">TITLE</p>
            </div>
            <div class="section-2">
                <p class="clock"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/clock.png" alt=""></p>
            </div>
        </div>
        <hr class="song-hr">
    </div>


<?php 
$img = get_template_directory_uri();
$rows = get_field('album-song-info');
if( $rows ) {
    echo '<div class="album-songs-row">';
    foreach( $rows as $row ) {
        $number = $row['album-song-number'];
        $name = $row['album-song-name'];
        $time = $row['album-song-time'];
        $link = $row['album-song-link'];

        echo "
        <div class='song-row'>
            <div class='section-1'>
                <p>$number</p>
                <p class='song-bold'>$name</p>
            </div>
            <div class='section-2'>
                <p class='time'>$time</p>
                <a class='song-player' href='{$link['url']}'><img src='{$img}/dist/images/play.png' alt=''></a>
            </div>
        </div>
        ";
    }
    echo '</div>';
}

?>

</div>


<?php get_footer();?>