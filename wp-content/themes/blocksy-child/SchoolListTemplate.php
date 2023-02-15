<?php /* Template Name: SchoolListTemplate */ ?>
<?php get_header(); ?>
<?php if (is_active_sidebar( 'left-sidebar')) : ?>
    <div id="secondary" class="widget-area" role="complementary">
    <?php dynamic_sidebar( 'left-sidebar' ); ?>
    </div>
<?php endif; ?>
<?php

/* Start the Loop */
while ( have_posts() ) :
	the_post();
	global $post;
	$slug = $post->post_name;
	if($slug == 'state-form') {
		get_template_part( 'template-parts/content/page-state-form' );
	}
	if($slug == 'school-list') {
		get_template_part( 'template-parts/page-school-list' );
	}
endwhile; // End of the loop.
?>
<?php get_footer(); ?>