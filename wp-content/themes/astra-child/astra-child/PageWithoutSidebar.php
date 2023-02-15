<?php /* Template Name: PageWithoutSidebar */ ?>
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
	if($slug == 'display-state') {
		get_template_part( 'template-parts/content/page-display-state' );
	}
endwhile; // End of the loop.


?>

<?php get_footer(); ?>