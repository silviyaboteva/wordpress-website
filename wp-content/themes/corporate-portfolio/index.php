<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package corporate portfolio
 * @version 1.0
 */
get_header(); ?>

<div class="container">
	<div class="wrap clearfix">
		<?php $blog_layout = get_theme_mod( 'cp_blog_layout', 'corporate-portfolio');
			switch ($blog_layout) {
				case 'blogright': ?>
					<main id="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<!-- Article -->
							<article <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
								<?php 
									get_template_part( 'content' ); ?>
							</article>
						<?php endwhile; ?>
							<?php if ( $wp_query->max_num_pages > 1 ) : ?>
								<!--Pagination-->
								<div class="pagination">
									<?php if( function_exists( 'wp_pagenavi' ) ) : ?>
										<?php wp_pagenavi(); ?>
									<?php else : ?>
										<?php next_posts_link( '<span>&larr;</span> '.__( 'Older Posts', 'corporate-portfolio' ).'' ); ?>
										<?php previous_posts_link( __( 'Newer Posts', 'corporate-portfolio' ).' <span>&rarr;</span>' ); ?>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						<?php endif; ?>
					</main>
				<?php get_sidebar(); ?>	
				<?php break;
				case 'blogleft': ?>
					
					<main id="content" class="blog-left" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<!-- Article -->
							<article <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
								<?php 
									
									get_template_part( 'content' ); ?>
							</article>
						<?php endwhile; ?>
							<?php if ( $wp_query->max_num_pages > 1 ) : ?>
								<!--Pagination-->
								<div class="pagination">
									<?php if( function_exists( 'wp_pagenavi' ) ) : ?>
										<?php wp_pagenavi(); ?>
									<?php else : ?>
										<?php next_posts_link( '<span>&larr;</span> '.__( 'Older Posts', 'corporate-portfolio' ).'' ); ?>
										<?php previous_posts_link( __( 'Newer Posts', 'corporate-portfolio' ).' <span>&rarr;</span>' ); ?>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						<?php endif; ?>
					</main>
					<?php get_sidebar( 'blog-left' ); ?> 

				<?php break;
				case 'blogwide' : ?>
					<main id="content" class="blog-full" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<!-- Article -->
							<article <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
								<?php 
									
									get_template_part( 'content' ); ?>
							</article>
						<?php endwhile; ?>
							<?php if ( $wp_query->max_num_pages > 1 ) : ?>
								<!--Pagination-->
								<div class="pagination">
									<?php if( function_exists( 'wp_pagenavi' ) ) : ?>
										<?php wp_pagenavi(); ?>
									<?php else : ?>
										<?php next_posts_link( '<span>&larr;</span> '.__( 'Older Posts', 'corporate-portfolio' ).'' ); ?>
										<?php previous_posts_link( __( 'Newer Posts', 'corporate-portfolio' ).' <span>&rarr;</span>' ); ?>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						<?php endif; ?>
					</main>

				<?php break;
				default: ?>
					<main id="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<!-- Article -->
						<article <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
							<?php 
								
								get_template_part( 'content' ); ?>
						</article>
					<?php endwhile; ?>
						<?php if ( $wp_query->max_num_pages > 1 ) : ?>
							<!--Pagination-->
							<div class="pagination">
								<?php if( function_exists( 'wp_pagenavi' ) ) : ?>
									<?php wp_pagenavi(); ?>
								<?php else : ?>
									<?php next_posts_link( '<span>&larr;</span> '.__( 'Older Posts', 'corporate-portfolio' ).'' ); ?>
									<?php previous_posts_link( __( 'Newer Posts', 'corporate-portfolio' ).' <span>&rarr;</span>' ); ?>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						<?php endif; ?>
					</main>
				<?php get_sidebar();
				break; 

			} ?>
	</div> 
</div>
			
<?php get_footer();
