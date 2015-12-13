<?php
/**
 * Adds custom widgets
 */

/**
 * Include helper functions that display widget fields in the dashboard
 */
require get_template_directory() . '/inc/widgets/widget-fields.php';

/**
 * Register Social Icons Widget
 */
require get_template_directory() . '/inc/widgets/widget-social-icons.php';

/**
 * Register Hepouf custom recent comments
 */
require get_template_directory() . '/inc/widgets/widget-hepouf-recent-comment.php';