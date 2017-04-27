<?php
/**
* @package Corporate Portfolio 
*
* description this files display the content of page left sidebar
*
*/
?>

<aside id="sidebar" class="page-left-sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">

	<?php if( ! is_active_sidebar( 'cp-sidebar-page-left' ) ) :
		return;
	else :
		dynamic_sidebar( 'cp-sidebar-page-left' );
	endif; ?>

</aside>