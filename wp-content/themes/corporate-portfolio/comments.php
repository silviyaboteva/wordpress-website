<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Corporate Portfolio
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
    if ( post_password_required() ) return; ?>

<?php $comments_by_type = separate_comments( $comments ); ?>

<?php if ( !empty( $comments_by_type['comment'] ) ) : ?>

	<!--Comments Section-->
	<div class="entry-comments" id="comments">
    
		<h3><?php comments_number( esc_html__( '0 Comments', 'corporate-portfolio' ), esc_html__( '1 Comment', 'corporate-portfolio' ), esc_html__( '% Comments', 'corporate-portfolio' ) ); ?></h3>  

        <?php if ( ! comments_open() && get_comments_number() != '0' ) : ?>

			<p class="comments-closed"><?php esc_html_e( 'Comments are closed.', 'corporate-portfolio' ) ?></p>

		<?php else : ?>

        	<ol class="comment-list">
            	<?php wp_list_comments( 'type=comment&callback=corporate_portfolio_comment' ); ?>
        	</ol>

            <?php paginate_comments_links() ?>

    	<?php endif; ?>	    	
	</div>

<?php elseif ( ! comments_open() && get_comments_number() != '0' && post_type_supports( get_post_type(), 'comments' ) ) : ?>
    
    <p><?php esc_html_e( 'Comments are closed.', 'corporate-portfolio' ) ?></p>
    
<?php endif; ?>


<?php if ( comments_open() ) : ?>
    
	<!--Leave Response-->
	<?php
        $corporate_portfolio_fields = array(
            'comment_field'        => '<p class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
            'must_log_in'          => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'corporate-portfolio' ), wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
            'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out</a>', 'corporate-portfolio' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
            'comment_notes_before' => '',
            'comment_notes_after'  => '',
            'title_reply'          => esc_html__( 'Leave a reply', 'corporate-portfolio' ),
            'title_reply_to'       => esc_html__( 'Leave a reply to %s', 'corporate-portfolio' ),
            'cancel_reply_link'    => esc_html__( 'Cancel reply', 'corporate-portfolio' ),
            'label_submit'         => esc_html__( 'Submit Comment', 'corporate-portfolio' )
        );
    ?>
    		    	
    <?php comment_form( $corporate_portfolio_fields ); ?>
    
<?php endif;
