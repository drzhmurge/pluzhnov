<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Zigcy Lite
 */

get_header();
$zigcy_lite_archive_post_layout_sidebars = get_theme_mod('zigcy_lite_archive_post_layout_sidebars','right-sidebar-enabled'); 
?>

	<div class="container">
		<div class="sml-archive-wrapper <?php echo esc_attr($zigcy_lite_archive_post_layout_sidebars); ?>">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">
					
					<?php if ( have_posts() ) : ?>

								

								<?php
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();

									/**
									 * Run the loop for the search to output the results.
									 * If you want to overload this in a child theme then include a file
									 * called content-search.php and that will be used instead.
									 */
									get_template_part( 'template-parts/content', 'archive' );

								endwhile;

								zigcy_lite_numeric_posts_nav();

					else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

				</main><!-- #main -->
			</div><!-- #primary -->
			<?php
		    // sidebar options
		    $archive_sidebar_explode  =  (explode("-",$zigcy_lite_archive_post_layout_sidebars));
		    $archive_sidebar          = $archive_sidebar_explode[0];
		    if( $archive_sidebar == 'both'){
		        get_sidebar('left');
		        get_sidebar('right');
		    }elseif( $archive_sidebar != 'no'){
		        get_sidebar( $archive_sidebar );
		    }   
		    ?>
		</div>
	</div>

<?php
get_footer();
