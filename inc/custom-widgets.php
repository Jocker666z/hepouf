<?php

/**
 * Helper function that updates fields in the dashboard form
 *
 * @since aThemes Widget Pack 1.0
 */
function hepouf_widgets_updated_field_value( $widget_field, $new_field_value ) {
	extract( $widget_field );
	
	// Allow only integers in number fields
	if( $hepouf_widgets_field_type == 'number' ) {
		return absint( $new_field_value );
		
	// Allow some tags in textareas
	} elseif( $hepouf_widgets_field_type == 'textarea' ) {
		// Check if field array specifed allowed tags
		if( !isset( $hepouf_widgets_allowed_tags ) ) {
			// If not, fallback to default tags
			$hepouf_widgets_allowed_tags = '<p><strong><em><a>';
		}
		return strip_tags( $new_field_value, $hepouf_widgets_allowed_tags );
		
	// No allowed tags for all other fields
	} else {
		return strip_tags( $new_field_value );
	}
}

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