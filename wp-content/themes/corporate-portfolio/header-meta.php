<?php
/**
 * This template provide meta description on head section
 *
 * @package Corporate Portfolio
 */

?>

<section id="header-meta" class="clearfix">

	<?php if ( is_archive() ) :
	
		the_archive_title( '<h1>', '</h1>' );
        the_archive_description( '<h2 class="archive-description">', '</h2>' );

	elseif ( is_author( $author ) ) : ?>

		<h2><?php esc_html( the_author_meta( 'description' ) ); ?></h2>

	<?php elseif ( is_search() ) : ?>
					
		<h1><?php esc_html_e( 'Search results for', 'corporate-portfolio' ) ?>: '<?php the_search_query(); ?>'</h1>

	<?php else : ?>
						
		<h1><?php single_post_title(); ?></h1>
	
		<?php if ( !is_archive() && !is_search() && !is_404() ) : ?>
		
			<?php $page_id = get_queried_object_id(); ?>
			<h2><?php echo get_post_field( 'post_excerpt', $page_id, 'display' ); ?></h2>
		
		<?php endif;?>

	<?php endif; ?>

	<?php if ( is_front_page() ) : ?>
		<?php if ( get_theme_mod( 'cp_button_link' ) ) : ?>
			<a href="<?php echo esc_url( get_theme_mod( 'cp_button_link') ); ?>" title="<?php echo esc_attr( get_theme_mod( 'cp_button_text') ); ?>" class="btn"><?php echo esc_html( get_theme_mod( 'cp_button_text' ) ); ?></a>
		<?php endif; ?>
						
	<?php endif; ?>

</section>