<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Corporate Portfolio
 */

?>	
		<footer id="footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
			<div class="wrap clearfix">

			    <!-- Links -->
			    <nav role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
				    <?php if( has_nav_menu( 'footer-menu' ) ) : ?>

					    <?php
						    wp_nav_menu(
							    array(
								    'theme_location' => 'footer-menu',
								    'container'      => false,
								    'menu_id'        => 'links',
								    'menu_class'     => 'footer-menu',
								    'depth'          => '1'
							    )
						    );
					    ?>
			    	<?php endif; ?>
				</nav>
				<?php if( get_theme_mod( 'footer_hide_copyright_section' ) == '' ) : ?>
				    <!-- Copyright -->
					<p class="copyright">

					<?php 
						if ( get_theme_mod( 'cp_footer_copyright_text' ) ):
		                    $cp_footer_text = get_theme_mod( 'cp_footer_copyright_text' );
		                    echo wp_kses( $cp_footer_text, array(
		                        'p' => array(),
		                        'a' => array(
		                                'href' => array(),
		                                'class' => array()
		                            )
		                    ) );
		                else :
		                	printf( __( '%1$s WordPress Theme  by %2$s', 'corporate-portfolio' ), 'Corporate Portfolio','<a href="'.esc_url( 'http://styledthemes.com/' ).'" target="_blank">StyledThemes</a>' );
		                endif; 
		            ?>
					</p>
				<?php endif; ?>	
			</div>
		</footer>

		<?php wp_footer(); ?>

	</body>
</html>