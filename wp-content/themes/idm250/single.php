<?php get_header();?>
helo
<h1><?php echo get_the_title(); ?></h1>
<div><?php echo get_the_excerpt(); ?></div>

<?php
$currentPostId = get_the_id();
$terms = get_the_terms($currentPostId, 'category');

if ($terms) {
    foreach ($terms as $term) {
        echo "<p>{$term->name}</p>";
    }
}
?>

<?php get_template_part('components/content'); ?>

<?php get_footer();?>