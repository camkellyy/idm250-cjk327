<?php
/**
 * This component is used to display the recent 3 projects.
 * We use the WP_Query class to get the posts.
 * @link https://developer.wordpress.org/reference/classes/wp_query/
 */

$args = [
    'post_type' => 'albums',
    'posts_per_page' => -1,
    'order' => 'ASC',
    'orderby' => 'date',
];
$project_posts_query = new WP_Query($args);
// $query = 'SELECT * FROM wp_posts WHERE post_type = "projects" ORDER BY post_date DESC LIMIT 3';

?>

<div class="listing-project-container">
    <div class="project-container-listing">
        <?php
        // The Loop
        if ($project_posts_query->have_posts()) {
            while ($project_posts_query->have_posts()) {
                // This is where the post's data is set up
                $project_posts_query->the_post();
                get_template_part('components/project-card');
            }
            // Restore original Post Data
            wp_reset_postdata();
        } else {
            echo '<p>Sorry, no posts matched your criteria.</p>';
        }?>

    </div>
    <!-- More posts... -->
</div>