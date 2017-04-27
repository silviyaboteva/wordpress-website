<?php
/**
 * Search Form Template
 *
 * @link http://codex.wordpress.org/Function_Reference/get_search_form
 *
 * @package Corporate Portfolio
 */
?>

<form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search">
	<input class="search-input" type="search" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php esc_attr_e( 'To search, type and hit enter.', 'corporate-portfolio' ); ?>">
	<button class="search-submit btn" type="submit" role="button"><i class="fa fa-search"></i></button>
</form>