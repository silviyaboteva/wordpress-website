<?php
/* ----------------------------------------------------------------

 TABLE OF CONTENTS
 
	 1. LOCALIZATION
	 2. CONTENT WIDTH
	 3. THEME SETUP
	 4. REGISTER SIDEBAR
	 5. ENQUEUE SCRIPTS
	 6. EXCLUDE FROM SEARCH
	 7. COMMENTS
	 8. MORE LINK
	 9. IS BLOG
	12. POST FORMAT: GALLERY
	13. HAS POST THUMB CLASS
	14. CONTACT FORM
	15. SHORTCODE VIDEO RESPONSIVE
	16. INIT
   
-----------------------------------------------------------------*/


/* ----------------------------------------------------------------
   1. LOCALIZATION
-----------------------------------------------------------------*/

function corporate_portfolio_localization() {

	load_theme_textdomain( 'corporate-portfolio', get_template_directory() . '/languages' );
}

add_action( 'after_setup_theme', 'corporate_portfolio_localization' );


/* ----------------------------------------------------------------
   2. CONTENT WIDTH
-----------------------------------------------------------------*/

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Corporate portfolio 1.0.10
 */
function corporate_portfolio_content_width() {

	$GLOBALS['content_width'] = apply_filters( 'corporate_portfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'corporate_portfolio_content_width', 0 );

/**
* redirect page template  homepage, full width and attachment with content width 980
*/
if ( ! function_exists( 'corporate_portfolio_content_width' ) ) {

    function corporate_portfolio_content_width() {

        if( is_page_template( 'template-homepage.php' ) || is_page_template( 'template-full-width.php' )  || is_attachment() ) {
            global $content_width;
            $content_width = 980;
        }
    }
}

add_action( 'template_redirect', 'corporate_portfolio_content_width' );


/* ----------------------------------------------------------------
   3. THEME SETUP
-----------------------------------------------------------------*/

if ( ! function_exists( 'corporate_portfolio_theme_setup' ) ) {

    function corporate_portfolio_theme_setup() {
    	
    	/* Register WP3+ menus */
    	// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'header-menu' => esc_html__( 'Header Menu', 'corporate-portfolio' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'corporate-portfolio' )
		) );

    	/* Configure WP 2.9+ thumbnails */
    	add_theme_support( 'post-thumbnails' );

        add_image_size( 'corporate-portfolio-s', 300, 300, true );
        add_image_size( 'corporate-portfolio-m', 640, 359, true );
        add_image_size( 'corporate-portfolio-l', 980, 550, true );
        add_image_size( 'corporate-portfolio-homepage-featurd-post', 64, 64, true );   

        //support custom logo
        add_theme_support( 'custom-logo', 
        	array(
			   'height'      => 240,
			   'width'       => 240,
			   'flex-width' => true,
			   'flex-height' => true
		) );
		//automattic feed links
        add_theme_support( 'automatic-feed-links' );
        //page excedrpt
        add_post_type_support( 'page', 'excerpt' );

		//generate automattic title tag
        add_theme_support( "title-tag" );
        //make compatible with woocommmerce
        add_theme_support( 'woocommerce' );

    }
}

add_action( 'after_setup_theme', 'corporate_portfolio_theme_setup' );


/* ----------------------------------------------------------------
   4. REGISTER SIDEBAR
-----------------------------------------------------------------*/
function corporate_portfolio_widgets_init() {

	register_sidebar( array(
		'name' => esc_html__( 'Blog Right Sidebar', 'corporate-portfolio' ),
		'id' => 'sidebar-blog',
		'description' => esc_html__( 'Widgets placed here will display in the sidebar on both blog and post pages.', 'corporate-portfolio' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));


	//register blog left sidebar
	register_sidebar( array(
		'name' => esc_html__( 'Blog Left Sidebar', 'corporate-portfolio' ),
		'id' => 'cp-sidebar-blog-left',
		'description' => esc_html__( 'Widgets placed here will display in the Left sidebar on on both blog and post pages.', 'corporate-portfolio' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));

	register_sidebar( array(
		'name' => esc_html__( 'Page Right Sidebar', 'corporate-portfolio' ),
		'id' => 'sidebar-page',
		'description' => __( 'Widgets placed here will display in the sidebar on pages.', 'corporate-portfolio' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));

	//register page left sidebar
	register_sidebar( array(
		'name' => esc_html__( 'Page Left Sidebar', 'corporate-portfolio' ),
		'id' => 'cp-sidebar-page-left',
		'description' => __( 'Widgets placed here will display in the Left sidebar on pages.', 'corporate-portfolio' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));

}
add_action( 'widgets_init', 'corporate_portfolio_widgets_init' );


/* ----------------------------------------------------------------
   5. ENQUEUE SCRIPTS
-----------------------------------------------------------------*/

if ( ! function_exists( 'corporate_portfolio_enqueue_scripts' ) ) {
	function corporate_portfolio_enqueue_scripts() {

	    /* Register */
	    wp_register_script( 'jquery-flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ), '2.6.3', true );
		/*register slick nav*/
		wp_register_script( 'jquery-slicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array( 'jquery' ), '4.4', true );
		
		wp_register_script( 'corporate-portfolio-custom', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery' ), '1.0', true, true );

		wp_enqueue_script( 'jquery-flexslider' );
		wp_enqueue_script( 'jquery-slicknav' );
		wp_enqueue_script( 'corporate-portfolio-custom' );
		
		if ( is_singular( 'post' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
				
		/* Stylesheets */
		
		wp_enqueue_style( 'corporate-portfolio-google-font-sourcesanspro', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,400italic' );
		
		wp_enqueue_style( 'corporate-portfolio-style', get_stylesheet_uri(), false, '1.0' );

		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', false, '4.6.3' );

		wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/css/slicknav.css', false, '1.1' );

		wp_enqueue_style( 'corporate-portfolio-responsive', get_template_directory_uri() . '/css/responsive.css', false, '1.1' );
		/*Enqueue dynamic css on 'corporate-portfolio-responsive'*/
		$corporate_portfolio_accent = get_theme_mod( 'cp_accentcolor' );

		if( $corporate_portfolio_accent ) {
			
			include get_template_directory().'/css/style.css.php';
			
		}

    }
}

add_action( 'wp_enqueue_scripts', 'corporate_portfolio_enqueue_scripts' );


/* ----------------------------------------------------------------
   7. COMMENTS
-----------------------------------------------------------------*/

if ( ! function_exists( 'corporate_portfolio_comment' ) ) {

	function corporate_portfolio_comment( $comment, $args, $depth ) {
	
        $GLOBALS['comment'] = $comment; ?>
        
        <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	        <article class="clearfix" itemprop="comment" itemscope="itemscope" itemtype="http://schema.org/UserComments">
				<?php echo get_avatar( $comment, $size='75' ); ?>
		        <div class="comment-author">
					<p class="vcard" itemprop="creator" itemscope="itemscope" itemtype="http://schema.org/Person">
						<cite class="fn" itemprop="name"><?php comment_author_link(); ?></cite>
						<time itemprop="commentTime" datetime="<?php  comment_time( 'c' ); ?>">
							<?php comment_date( 'F dS, Y' ); ?>
						</time>
						<span class="comment-reply">
				            <?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']) ) ) ?>
				            <?php edit_comment_link( esc_html__( 'Edit', 'corporate-portfolio' ), ' &middot; ', '' ) ?>
			            </span>
					</p>
		        </div>
				<div class="comment-content" itemprop="commentText">
		            <?php comment_text() ?>
		            <?php if ( $comment->comment_approved == '0' ) : ?>
		                <p><em class="awaiting"><?php esc_html_e( 'Your comment is awaiting moderation.', 'corporate-portfolio' ) ?></em></p>
		            <?php endif; ?>
				</div>
	        </article>
		</li>

<?php }
}


/* ----------------------------------------------------------------
   8. MORE LINK
-----------------------------------------------------------------*/

function corporate_portfolio_more_link( $more_link, $more_link_text ) {
	
	return str_replace( $more_link_text, esc_html__( 'Continue Reading', 'corporate-portfolio' ), $more_link );
}

add_filter( 'the_content_more_link', 'corporate_portfolio_more_link', 10, 2 );


/*Check for blog page*/

function corporate_portfolio_blog() {
	global  $post;
	$posttype = get_post_type( $post );
	return ( ( ( is_archive() ) || ( is_author() ) || ( is_category() ) || ( is_home() ) || ( is_single() ) || ( is_tag() ) || ( is_search() ) ) && ( $posttype == 'post' )  ) ? true : false;
}


if ( ! function_exists( 'corporate_portfolio_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since version 1.0
 */
function corporate_portfolio_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/*add customizer file*/

require get_template_directory() . '/includes/customizer.php';

/*include category dropdown*/
require get_template_directory() . '/includes/category-dropdown.php';