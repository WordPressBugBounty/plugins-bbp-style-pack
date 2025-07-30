<?php

/**
 * No Topics Feedback Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;


//This template is only active if it has been called at around line 151 in bbp-style-pack.php

/* This template is used if in dashboard>settings>bbp style pack>topic index styling
	item 'Change empty forum message ' bsp_style_settings_ti[empty_forum] message is set 
	or if bsp_style_settings_ti[empty_forumActivate] is set
*/

global $bsp_style_settings_ti ;

//if activate is empty, then we show a message, otherwise we show nothing !
if (empty($bsp_style_settings_ti['empty_forumActivate'])) {
?>

<div class="bbp-template-notice">
	<ul>
		<li>
			<?php echo $bsp_style_settings_ti['empty_forum']; ?>
		</li>
	</ul>
</div>

<?php }

