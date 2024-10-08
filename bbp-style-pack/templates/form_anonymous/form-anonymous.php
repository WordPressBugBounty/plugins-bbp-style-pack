<?php

/**
 * Anonymous User
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

if ( bbp_current_user_can_access_anonymous_user_form() ) : ?>

	<?php global $bsp_style_settings_form ; ?>

	<?php do_action( 'bbp_theme_before_anonymous_form' ); ?>
		
	<?php if (!empty ($bsp_style_settings_form['no_anon_nameActivate']) && !empty ($bsp_style_settings_form['no_anon_emailActivate']) && !empty ($bsp_style_settings_form['no_anon_websiteActivate'])) $none = 1 ; ?>
	<?php if (empty ($none)) {?>
	<fieldset class="bbp-form">
	<legend><?php ( bbp_is_topic_edit() || bbp_is_reply_edit() ) ? esc_html_e( 'Author Information', 'bbpress' ) : esc_html_e( 'Your information:', 'bbpress' ); ?></legend>
	<?php }?>	
		
		<?php do_action( 'bbp_theme_anonymous_form_extras_top' ); ?>
		
		<?php if (empty ($bsp_style_settings_form['no_anon_nameActivate'])) { ?>

		<p>
			<label for="bbp_anonymous_author"><?php esc_html_e( 'Name (required):', 'bbpress' ); ?></label><br />
			<input type="text" id="bbp_anonymous_author"  value="<?php bbp_author_display_name(); ?>" size="40" maxlength="100" name="bbp_anonymous_name" autocomplete="off" />
		</p>
		
		<?php } ?>
		
		<?php if (empty ($bsp_style_settings_form['no_anon_emailActivate'])) { ?>

		<p>
			<label for="bbp_anonymous_email"><?php esc_html_e( 'Mail (will not be published) (required):', 'bbpress' ); ?></label><br />
			<input type="text" id="bbp_anonymous_email"   value="<?php bbp_author_email(); ?>" size="40" maxlength="100" name="bbp_anonymous_email" />
		</p>
		
		<?php } ?>
		
		<?php if (empty ($bsp_style_settings_form['no_anon_websiteActivate'])) { ?>

		<p>
			<label for="bbp_anonymous_website"><?php esc_html_e( 'Website:', 'bbpress' ); ?></label><br />
			<input type="text" id="bbp_anonymous_website" value="<?php bbp_author_url(); ?>" size="40" maxlength="200" name="bbp_anonymous_website" />
		</p>
		
		<?php } ?>

		<?php do_action( 'bbp_theme_anonymous_form_extras_bottom' ); ?>
	<?php if (!empty ($bsp_style_settings_form['no_anon_nameActivate']) && !empty ($bsp_style_settings_form['no_anon_emailActivate']) && !empty ($bsp_style_settings_form['no_anon_websiteActivate'])) { ?>
		
	</fieldset>
	<?php } ?>

	<?php do_action( 'bbp_theme_after_anonymous_form' ); ?>

<?php endif;
