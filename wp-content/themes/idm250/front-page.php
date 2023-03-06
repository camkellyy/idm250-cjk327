<?php get_header();?>

<!-- <h1 class="title"><?php echo get_the_title(); ?></h1> -->

<p><?php the_field('two-col-hero-description-home');?></p>

<?php 
$link = get_field('two-col-hero-link-home');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
    <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
<?php endif; ?>

<?php 
$image = get_field('two-col-hero-image-home');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
if( $image ) {
    echo wp_get_attachment_image( $image, $size );
}
?>

<?php get_template_part('components/content'); ?>

<?php get_footer();?>