<?php

/**
 * Search Loop - Single Reply
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;


?>

<div class="bbp-reply-header">
	<div class="bbp-meta">
		<span class="bbp-reply-post-date"><?php bbp_reply_post_date(); ?></span>
		<a href="<?php bbp_reply_url(); ?>" class="bbp-reply-permalink">#<?php bbp_reply_id(); ?></a>
		<?php do_action( 'bbp_theme_before_reply_admin_links' ); ?>

		<?php
                $r = bbp_parse_args( $args, array(
                        'id'     => 0,
                        'before' => '<span class="bbp-admin-links">',
                        'after'  => '</span>',
                        'sep'    => ' | ',
                        'links'  => array()
                ), 'bsp_modtools_get_reply_admin_links' );
                $args = array () ;
                $args ['links'] = array(
                                            'edit'    => bbp_get_reply_edit_link   ( $r ),
                                            'move'    => bbp_get_reply_move_link   ( $r ),
                                            'trash'   => bbp_get_reply_trash_link  ( $r ),
                                            'spam'    => bbp_get_reply_spam_link   ( $r ),
                                            'approve' => bbp_get_reply_approve_link( $r ),
					);
                ?>
		<?php bbp_reply_admin_links($args); ?>

		<?php do_action( 'bbp_theme_after_reply_admin_links' ); ?>
	</div><!-- .bbp-meta -->

	<div class="bbp-reply-title">
		<h3><?php esc_html_e( 'In reply to: ', 'bbpress' ); ?>
		<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink( bbp_get_reply_topic_id() ); ?>"><?php bbp_topic_title( bbp_get_reply_topic_id() ); ?></a></h3>
	</div><!-- .bbp-reply-title -->
</div><!-- .bbp-reply-header -->

<div id="post-<?php bbp_reply_id(); ?>" <?php bbp_reply_class(); ?>>
	<div class="bbp-reply-author">

		<?php do_action( 'bbp_theme_before_reply_author_details' ); ?>

		<?php bbp_reply_author_link( array( 'show_role' => true ) ); ?>

		<?php if ( bbp_is_user_keymaster() ) : ?>

			<?php do_action( 'bbp_theme_before_reply_author_admin_details' ); ?>

			<div class="bbp-reply-ip"><?php bbp_author_ip( bbp_get_reply_id() ); ?></div>

			<?php do_action( 'bbp_theme_after_reply_author_admin_details' ); ?>

		<?php endif; ?>

		<?php do_action( 'bbp_theme_after_reply_author_details' ); ?>

	</div><!-- .bbp-reply-author -->

	<div class="bbp-reply-content">

		<?php do_action( 'bbp_theme_before_reply_content' ); ?>

		<?php bbp_reply_content(); ?>

		<?php do_action( 'bbp_theme_after_reply_content' ); ?>

	</div><!-- .bbp-reply-content -->
</div><!-- #post-<?php bbp_reply_id(); ?> -->

