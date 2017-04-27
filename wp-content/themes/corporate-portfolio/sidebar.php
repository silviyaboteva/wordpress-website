<?php
/**
 * The Sidebar containing the primary widget area
 * @package Corporate Portfolio
 */

if ( is_active_sidebar( 'sidebar-blog' )  ) : ?>
	<aside id="sidebar" class="blog-sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
		<?php dynamic_sidebar( 'sidebar-blog' ); ?>
	</aside><!-- #sidebar .blog-sidebar -->
<?php endif;
