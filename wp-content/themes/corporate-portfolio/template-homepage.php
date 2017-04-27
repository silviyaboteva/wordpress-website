<?php /* Template Name: Homepage */ ?>

<?php get_header();
	
	if( get_theme_mod( 'homepage_show_slider_post' ) == 1 ) : ?>
		<!--Hero-->
		<section id="hero">
			<div class="wrap">

				<?php
					$corporate_slider_post = get_theme_mod( 'homepage_slider_post' );
					$corporate_portfolio_home_number_of_post_to_show = get_theme_mod( 'home_slider_select_number_of_post', 3 );
					$loop = new WP_Query( array( 
						'cat' => absint( $corporate_slider_post ), 
						'posts_per_page' => intval( $corporate_portfolio_home_number_of_post_to_show ) 
					) );


				if ( $loop->have_posts() ) : ?>

				<div class="flexslider">
					<img class="browser" src="<?php echo esc_url( get_template_directory_uri().'/images/browser-bar.svg' ); ?>" alt="<?php esc_attr_e( 'Browser Bar', 'corporate-portfolio' ); ?>" />
					<ul class="slides">

					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

						<li class="slide">
						<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>" rel="bookmark">
								<?php the_post_thumbnail( 'corporate-portfolio-l' ); ?>
								<span><?php esc_html_e( 'View project', 'corporate-portfolio' ); ?></span>
								<div class="overlay"></div>
							</a>
						<?php endif; ?>
						</li>

					<?php endwhile; ?>

				</div>

				<?php wp_reset_postdata(); ?>

				<?php endif; ?>
			
			</div>
		</section>
	<?php endif; ?>

	<!--Text Columns @version- 1.0.3-->
	<?php if( get_theme_mod( 'homepage_show_featured_post' ) == 1 ) : ?>
		<section id="columns">
			<div class="wrap clearfix">
			
				<?php $corporate_portfolio_featured_post = get_theme_mod( 'homepage_featured_post' );
				$corporate_portfolio_featured_number_of_post_to_show = get_theme_mod( 'home_featured_select_number_of_post', 3 );
				$featured_post_loop = new WP_Query( array( 
					'cat' => absint( $corporate_portfolio_featured_post ), 
					'posts_per_page' => intval( $corporate_portfolio_featured_number_of_post_to_show ) 
				) );

				$count = 0;

				while ( $featured_post_loop->have_posts() ) : $featured_post_loop->the_post();
					global $post; 
					$count++;
					$column_last = '';
					if( $count % 3 == 0 ) { $column_last = 'last'; } ?>

					<div  <?php post_class( 'homepage-featured-post column'. ' '. esc_attr( $column_last ) ); ?> >
						<?php if ( has_post_thumbnail() ) { ?>
								<?php the_post_thumbnail( 'corporate-portfolio-homepage-featurd-post', array( 'class' => esc_attr( 'homepage-featured-post' ) ) ); ?>
								
						<?php } ?>
						<h2><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
						<?php the_excerpt(); ?>

						<p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php esc_html_e('Learn More', 'corporate-portfolio' ); ?></a></p>
					</div>

				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>
			</div>
		</section>
	<?php endif;


	/*Blog section*/
	if( get_theme_mod( 'homepage_hide_blog_section' ) == '' ) : ?>
		<section id="blog">
			<div class="wrap clearfix">
				
				<?php
					$corporate_portfolio_blog_number_of_post_to_show = get_theme_mod( 'home_blog_select_number_of_post', 3 );

					$args = array(
						'post_type' => 'post',
						'posts_per_page' => intval( $corporate_portfolio_blog_number_of_post_to_show )
					);

					$loop = new WP_Query( $args );
					$count = 1;
				?>

				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<!-- Article -->
					<article class="post<?php if ( $count %3 == 0 ) { echo ' last'; }; $count ++; ?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

						<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>" rel="bookmark" class="entry-image">
								<?php the_post_thumbnail( 'corporate-portfolio-s' ); ?>
							</a>
						<?php endif; ?>

						<div class="entry-meta">
							<time class="entry-time" itemprop="datePublished" datetime="<?php echo esc_attr( get_the_time( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
							<?php esc_html_e( ' with ', 'corporate-portfolio' ); ?>
							<span class="entry-comments"><?php comments_popup_link( __( '0 Comments', 'corporate-portfolio' ), esc_html__( '1 Comment', 'corporate-portfolio' ), __( '% Comments', 'corporate-portfolio' ) ); ?></span>
						</div>
						
						<h2 class="entry-title" itemprop="headline">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
						</h2>

						<?php the_excerpt(); ?>
					
					</article>

				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>

			</div>
		</section>
	<?php endif;

get_footer();