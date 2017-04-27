<?php
/**
 * The template for displaying search results pages
 *
 * @package Corporate Portfolio
 *
 * @since Corporate Portfolio 1.0
 */

get_header(); ?>

<div class="container">

	<div class="wrap clearfix">

		<main id="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<!-- Article -->
				<article <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

					<?php 
						get_template_part( 'content' );
					?>

				</article>

			<?php endwhile; ?>

				<?php if ( $wp_query->max_num_pages > 1 ) : ?>

					<!--Pagination-->
					<div class="pagination">

						<?php if( function_exists( 'wp_pagenavi' ) ) : ?>

							<?php wp_pagenavi(); ?>

						<?php else : ?>

							<?php next_posts_link( '<span>&larr;</span> '.esc_html__( 'Older Posts', 'corporate-portfolio' ).'' ); ?>
							<?php previous_posts_link( esc_html__( 'Newer Posts', 'corporate-portfolio' ).' <span>&rarr;</span>' ); ?>

						<?php endif; ?>

					</div>

				<?php else : ?>

					<?php esc_html_e( 'Your search did not match any entries', 'corporate-portfolio' ) ?>

				<?php endif; ?>

			<?php endif; ?>
		
		</main>

		<!--Sidebar-->
		<?php get_sidebar(); ?>
	
	</div>

</div>
			
<?php get_footer();

