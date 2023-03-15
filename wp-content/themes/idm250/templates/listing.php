<?php
/* Template Name: Listing */
?>

<?php get_header('light'); ?>

<div class="listing-bg-img" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>

<?php 
get_template_part('components/listing-projects');
?>

<?php get_footer();?>