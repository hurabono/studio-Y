<?php
/**
 * The template for displaying all single posts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="page-header <?php if (has_post_thumbnail() ) {?> has-feature-image <?php } ?> ">
	<div class="page-background"
	<?php 
		if ( has_post_thumbnail() ){ ?> 
		style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?> );" 
	<?php } ?>
	></div>

	<div class="container" style="max-width:1280px">
		<header class="single-page-header">
			<a href="<?php echo get_category_link(get_the_category()[0]); ?>" class="category-holder">
				<?php echo get_the_category()[0] -> cat_name; ?>
			</a>
		<?php the_title( '<h1 class="single-page-title">', '</h1>' ); ?>
		
			<div class="date"><b>Class Start Date: </b> <?php echo get_the_date('d M'); ?> <?php echo get_the_date('Y'); ?> </div>
		

		</header><!-- .entry-header -->
	</div>
</div>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'single' );
					understrap_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				}
				?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
