<?php
/**
 * Social icons widget
 */ 

/**
 * Adds aThemes_Social_Icons widget.
 */
add_action( 'widgets_init', create_function( '', 'register_widget( "athemes_social_icons" );' ) );
class aThemes_Social_Icons extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'athemes_social_icons',
			'Hepouf Header Social Icons',
			array(
				'description'	=> __( 'Display 5 links maximum in sidebar only', 'athemes' )
			)
		);
	}

	/**
	 * Helper function that holds widget fields
	 * Array is used in update and form functions
	 */
	 private function widget_fields() {
		$fields = array(
			// Title
			'widget_title' => array(
				'hepouf_widgets_name'			=> 'widget_title',
				'hepouf_widgets_title'			=> __( 'Title', 'hepouf' ),
				'hepouf_widgets_field_type'		=> 'text'
			),
			
			// Other fields
			'feed' => array (
				'hepouf_widgets_name'			=> 'feed',
				'hepouf_widgets_title'			=> __( 'RSS', 'hepouf' ),
				'hepouf_widgets_field_type'		=> 'text'
			),
			'github' => array (
				'hepouf_widgets_name'			=> 'github',
				'hepouf_widgets_title'			=> __( 'Github', 'hepouf' ),
				'hepouf_widgets_field_type'		=> 'text'
			),
			'twittor' => array (
				'hepouf_widgets_name'			=> 'twittor',
				'hepouf_widgets_title'			=> __( 'Twittor', 'hepouf' ),
				'hepouf_widgets_field_type'		=> 'text'
			),
			'fessebook' => array (
				'hepouf_widgets_name'			=> 'fessebook',
				'hepouf_widgets_title'			=> __( 'Fessebook', 'hepouf' ),
				'hepouf_widgets_field_type'		=> 'text'
			),
			'linkedin' => array (
				'hepouf_widgets_name'			=> 'linkedin',
				'hepouf_widgets_title'			=> __( 'LinkedIn', 'hepouf' ),
				'hepouf_widgets_field_type'		=> 'text'
			),
			'youtube' => array (
				'hepouf_widgets_name'			=> 'youtube',
				'hepouf_widgets_title'			=> __( 'YouTube', 'hepouf' ),
				'hepouf_widgets_field_type'		=> 'text'
			),
			'vimeo' => array (
				'hepouf_widgets_name'			=> 'vimeo',
				'hepouf_widgets_title'			=> __( 'Vimeo', 'hepouf' ),
				'hepouf_widgets_field_type'		=> 'text'
			),
			'tumblr' => array (
				'hepouf_widgets_name'			=> 'tumblr',
				'hepouf_widgets_title'			=> __( 'Tumblr', 'hepouf' ),
				'hepouf_widgets_field_type'		=> 'text'
			),
			'instagram' => array (
				'hepouf_widgets_name'			=> 'instagram',
				'hepouf_widgets_title'			=> __( 'Instagram', 'hepouf' ),
				'hepouf_widgets_field_type'		=> 'text'
			),
			'lastfm' => array (
				'hepouf_widgets_name'			=> 'lastfm',
				'hepouf_widgets_title'			=> __( 'Last.fm', 'hepouf' ),
				'hepouf_widgets_field_type'		=> 'text'
			),
			'soundcloud' => array (
				'hepouf_widgets_name'			=> 'soundcloud',
				'hepouf_widgets_title'			=> __( 'SoundCloud', 'hepouf' ),
				'hepouf_widgets_field_type'		=> 'text'
			),
            'reddit' => array (
				'hepouf_widgets_name'			=> 'reddit',
				'hepouf_widgets_title'			=> __( 'Reddit', 'hepouf' ),
				'hepouf_widgets_field_type'		=> 'text'
			),
             'paypal' => array (
				'hepouf_widgets_name'			=> 'paypal',
				'hepouf_widgets_title'			=> __( 'Paypal', 'hepouf' ),
				'hepouf_widgets_field_type'		=> 'text'
			),
		);

		return $fields;
	 }

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		
		$widget_title 			= apply_filters( 'widget_title', $instance['widget_title'] );
				
		echo $before_widget;
		
		// Show title
		echo '<ul>';
			// Loop through fields
			$widget_fields = $this->widget_fields();
			foreach( $widget_fields as $widget_field ) {
				// Make array elements available as variables
				extract( $widget_field );
				// Check if field has value and skip title field
				unset( $hepouf_widgets_field_value );
				if( isset( $instance[$hepouf_widgets_name] ) && 'widget_title' != $hepouf_widgets_name ) { 
					$hepouf_widgets_field_value = esc_attr( $instance[$hepouf_widgets_name] ); 
					if( '' != $hepouf_widgets_field_value ) {	?>
					<li><a href="<?php echo $hepouf_widgets_field_value; ?>" title="<?php echo $hepouf_widgets_title; ?>"><i class="ico-<?php echo $hepouf_widgets_name; ?>"></i></a></li>
					<?php }
				}
			}
		echo '</ul>';
		
		echo $after_widget;
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param	array	$new_instance	Values just sent to be saved.
	 * @param	array	$old_instance	Previously saved values from database.
	 *
	 * @uses	hepouf_widgets_show_widget_field()		defined in widget-fields.php
	 *
	 * @return	array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$widget_fields = $this->widget_fields();

		// Loop through fields
		foreach( $widget_fields as $widget_field ) {
			extract( $widget_field );
	
			// Use helper function to get updated field values
			$instance[$hepouf_widgets_name] = hepouf_widgets_updated_field_value( $widget_field, $new_instance[$hepouf_widgets_name] );
			echo $instance[$hepouf_widgets_name];
		}
				
		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 *
	 * @uses	hepouf_widgets_show_widget_field()		defined in widget-fields.php
	 */
	public function form( $instance ) {
		$widget_fields = $this->widget_fields();

		// Loop through fields
		foreach( $widget_fields as $widget_field ) {
		
			// Make array elements available as variables
			extract( $widget_field );
			$hepouf_widgets_field_value = isset( $instance[$hepouf_widgets_name] ) ? esc_attr( $instance[$hepouf_widgets_name] ) : '';
			hepouf_widgets_show_widget_field( $this, $widget_field, $hepouf_widgets_field_value );
		
		}	
	}

}
