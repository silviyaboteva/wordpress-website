<?php
/**
 * The sidebar contains the blog left sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Corporate portfolio
 */ 
?>


<aside id="sidebar" class="blog-left-sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">

	<?php if( ! is_active_sidebar( 'cp-sidebar-blog-left' ) ) :
		return;
	else :
		dynamic_sidebar( 'cp-sidebar-blog-left' );
	endif; ?>

</aside>