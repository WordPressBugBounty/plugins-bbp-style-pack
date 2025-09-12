<?php

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;


function bsp_amend_buddypress_loader () {
remove_action( 'bp_include', 'bbp_setup_buddypress', 10 ) ;
add_action( 'bp_include', 'bsp_setup_buddypress', 10 ); // Social network integration
}


function bsp_setup_buddypress() {

	if ( ! function_exists( 'buddypress' ) ) {

		/**
		 * Helper for BuddyPress 1.6 and earlier
		 *
		 * @since 2.2.0 bbPress (r4395)
		 *
		 * @return BuddyPress
		 */
		function buddypress() {
			return isset( $GLOBALS['bp'] ) ? $GLOBALS['bp'] : false;
		}
	}

	// Bail if in maintenance mode
	if ( ! buddypress() || buddypress()->maintenance_mode ) {
		return;
	}

	// Include the BuddyPress Component
	require_once (BSP_PLUGIN_DIR . '/buddypress-loader/loader.php');

	// Instantiate BuddyPress for bbPress
	bbpress()->extend->buddypress = new BBP_Forums_Component();
}
