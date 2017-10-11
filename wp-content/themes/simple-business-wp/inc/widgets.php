<?php

// #################################################
// About Row Content Widget
// #################################################

class simple_business_wp_about_content_widget extends WP_Widget {
    
    // Register widget
    function __construct() {
        parent::__construct(
          'nimbus-about-content-widget', // Base ID
          'Nimbus - About Content Widget', // Name
          array( 'description' => __('Display about content boxes on the frontpage', 'simple-business-wp'))  // Description
        );
    }
    
    // Create output function
    public function widget($args, $instance) {
		echo $args['before_widget'];
		?>
            <div class="col-sm-6">
                <i class="fa <?php if ( ! empty( $instance['faclass-left'] ) ) { echo esc_attr($instance['faclass-left']); } ?>"></i>
                <?php if ( ! empty( $instance['title-left'] ) ) { 
                    echo $args['before_title'] . esc_html($instance['title-left']) . $args['after_title']; 
                } ?>
                <p>
                    <?php if ( ! empty( $instance['description-left'] ) ) { 
                        echo esc_html($instance['description-left']); 
                    } ?>
                </p>
            </div>
            <div class="col-sm-6">
                <i class="fa <?php if ( ! empty( $instance['faclass-right'] ) ) { echo esc_attr($instance['faclass-right']); } ?>"></i>
                <?php if ( ! empty( $instance['title-right'] ) ) { 
                    echo $args['before_title'] . esc_html($instance['title-right']) . $args['after_title']; 
                } ?>
                <p>
                    <?php if ( ! empty( $instance['description-right'] ) ) { 
                        echo esc_html($instance['description-right']); 
                    } ?>
                </p>
            </div>   
		<?php
		echo $args['after_widget'];
    }  
    
    // Create widget form
	public function form( $instance ) {
		$title_left = ! empty( $instance['title-left'] ) ? $instance['title-left'] : __( 'New title', 'simple-business-wp');
		$description_left = ! empty( $instance['description-left'] ) ? $instance['description-left'] : __( 'New description text.', 'simple-business-wp');
		$faclass_left = ! empty( $instance['faclass-left'] ) ? $instance['faclass-left'] : __( 'fa-star', 'simple-business-wp');
		$title_right = ! empty( $instance['title-right'] ) ? $instance['title-right'] : __( 'New title', 'simple-business-wp');
		$description_right = ! empty( $instance['description-right'] ) ? $instance['description-right'] : __( 'New description text.', 'simple-business-wp');
		$faclass_right = ! empty( $instance['faclass-right'] ) ? $instance['faclass-right'] : __( 'fa-star', 'simple-business-wp');
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title-left' ); ?>"><?php _e( 'Left Column Title:', 'simple-business-wp'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title-left' ); ?>" name="<?php echo $this->get_field_name( 'title-left' ); ?>" type="text" value="<?php echo esc_attr( $title_left ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'description-left' ); ?>"><?php _e( 'Left Column Description:', 'simple-business-wp'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'description-left' ); ?>" name="<?php echo $this->get_field_name( 'description-left' ); ?>" type="text" value="<?php echo esc_attr( $description_left ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'faclass-left' ); ?>"><?php _e( 'Left Column FontAwesome Class:', 'simple-business-wp'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'faclass-left' ); ?>" name="<?php echo $this->get_field_name( 'faclass-left' ); ?>" type="text" value="<?php echo esc_attr( $faclass_left ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'title-right' ); ?>"><?php _e( 'Right Column Title:', 'simple-business-wp'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title-right' ); ?>" name="<?php echo $this->get_field_name( 'title-right' ); ?>" type="text" value="<?php echo esc_attr( $title_right ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Right Column Description:', 'simple-business-wp'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'description-right' ); ?>" name="<?php echo $this->get_field_name( 'description-right' ); ?>" type="text" value="<?php echo esc_attr( $description_right ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'faclass' ); ?>"><?php _e( 'Right Column FontAwesome Class:', 'simple-business-wp'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'faclass-right' ); ?>" name="<?php echo $this->get_field_name( 'faclass-right' ); ?>" type="text" value="<?php echo esc_attr( $faclass_right ); ?>">
		</p>
		
		<?php 
	}
    
    // Save stuff
    public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title-left'] = ( ! empty( $new_instance['title-left'] ) ) ? strip_tags( $new_instance['title-left'] ) : '';
		$instance['description-left'] = ( ! empty( $new_instance['description-left'] ) ) ? $new_instance['description-left'] : '';
        $instance['faclass-left'] = ( ! empty( $new_instance['faclass-left'] ) ) ? $new_instance['faclass-left'] : '';	
	    $instance['title-right'] = ( ! empty( $new_instance['title-right'] ) ) ? strip_tags( $new_instance['title-right'] ) : '';
		$instance['description-right'] = ( ! empty( $new_instance['description-right'] ) ) ? $new_instance['description-right'] : '';
        $instance['faclass-right'] = ( ! empty( $new_instance['faclass-right'] ) ) ? $new_instance['faclass-right'] : '';
		return $instance;
	}
        
}

// Register about row content widget
function register_simple_business_wp_about_content_widget() {
    register_widget( 'simple_business_wp_about_content_widget' );
}
add_action( 'widgets_init', 'register_simple_business_wp_about_content_widget' );




// #################################################
// Team Row Content Widget
// #################################################

class simple_business_wp_team_content_widget extends WP_Widget {
    
    // Register widget
    function __construct() {
        parent::__construct(
          'nimbus-team-content-widget', // Base ID
          'Nimbus - Team Content Widget', // Name
          array( 'description' => __('Display team content boxes on the frontpage', 'simple-business-wp')) // Description
        );
    }
    
    // Create output function
    public function widget($args, $instance) {
		echo $args['before_widget'];
		?>
            <img class="img-responsive img-circle center-block" src="<?php if ( ! empty( $instance['imgurl184sq'] ) ) { echo esc_url($instance['imgurl184sq']); } ?>" />
            <h4 class="team-item-title">
                <?php if ( ! empty( $instance['name'] ) ) { 
                    echo esc_html($instance['name']); 
                } ?>            	
            </h4>
            <h5 class="team-item-sub-title">
                <?php if ( ! empty( $instance['title'] ) ) { 
                    echo esc_html($instance['title']); 
                } ?> 
            </h5>
            <p class="team-social-icons">
            	<?php if (!empty( $instance['social1']) && !empty( $instance['faclass1'])) { ?>
            		<a href="<?php echo esc_url($instance['social1']); ?>"><i class="fa <?php echo esc_attr($instance['faclass1']); ?>"></i></a>
            	<?php } ?>
            	<?php if (!empty( $instance['social2']) && !empty( $instance['faclass2'])) { ?>
            		<a href="<?php echo esc_url($instance['social2']); ?>"><i class="fa <?php echo esc_attr($instance['faclass2']); ?>"></i></a>
            	<?php } ?>
            	<?php if (!empty( $instance['social3']) && !empty( $instance['faclass3'])) { ?>
            		<a href="<?php echo esc_url($instance['social3']); ?>"><i class="fa <?php echo esc_attr($instance['faclass3']); ?>"></i></a>
            	<?php } ?>
            </p>  
		<?php
		echo $args['after_widget'];
    }  
    
    // Create widget form
	public function form( $instance ) {
		$imgurl184sq = ! empty( $instance['imgurl184sq'] ) ? $instance['imgurl184sq'] : __( '', 'simple-business-wp');
		$name = ! empty( $instance['name'] ) ? $instance['name'] : __( '', 'simple-business-wp');
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( '', 'simple-business-wp');
		$social1 = ! empty( $instance['social1'] ) ? $instance['social1'] : __( '', 'simple-business-wp');
		$faclass1 = ! empty( $instance['faclass1'] ) ? $instance['faclass1'] : __( '', 'simple-business-wp');
		$social2 = ! empty( $instance['social2'] ) ? $instance['social2'] : __( '', 'simple-business-wp');
		$faclass2 = ! empty( $instance['faclass2'] ) ? $instance['faclass2'] : __( '', 'simple-business-wp');
		$social3 = ! empty( $instance['social3'] ) ? $instance['social3'] : __( '', 'simple-business-wp');
		$faclass3 = ! empty( $instance['faclass3'] ) ? $instance['faclass3'] : __( '', 'simple-business-wp');
		
		
		
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'imgurl184sq' ); ?>"><?php _e( 'Headshot Image (184x184px):', 'simple-business-wp'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'imgurl184sq' ); ?>" name="<?php echo $this->get_field_name( 'imgurl184sq' ); ?>" type="text" value="<?php echo esc_attr( $imgurl184sq ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e( 'Name:', 'simple-business-wp'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'simple-business-wp'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'social1' ); ?>"><?php _e( 'Social Media Link #1:', 'simple-business-wp'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'social1' ); ?>" name="<?php echo $this->get_field_name( 'social1' ); ?>" type="text" value="<?php echo esc_attr( $social1 ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'faclass1' ); ?>"><?php _e( 'FontAwesome Class #1:', 'simple-business-wp'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'faclass1' ); ?>" name="<?php echo $this->get_field_name( 'faclass1' ); ?>" type="text" value="<?php echo esc_attr( $faclass1 ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'social2' ); ?>"><?php _e( 'Social Media Link #2:', 'simple-business-wp'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'social2' ); ?>" name="<?php echo $this->get_field_name( 'social2' ); ?>" type="text" value="<?php echo esc_attr( $social2 ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'faclass2' ); ?>"><?php _e( 'FontAwesome Class #2:', 'simple-business-wp'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'faclass2' ); ?>" name="<?php echo $this->get_field_name( 'faclass2' ); ?>" type="text" value="<?php echo esc_attr( $faclass2 ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'social3' ); ?>"><?php _e( 'Social Media Link #3:', 'simple-business-wp'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'social3' ); ?>" name="<?php echo $this->get_field_name( 'social3' ); ?>" type="text" value="<?php echo esc_attr( $social3 ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'faclass3' ); ?>"><?php _e( 'FontAwesome Class #3:', 'simple-business-wp'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'faclass3' ); ?>" name="<?php echo $this->get_field_name( 'faclass3' ); ?>" type="text" value="<?php echo esc_attr( $faclass3 ); ?>">
		</p>


		
		<?php 
	}
    
    // Save stuff
    public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['imgurl184sq'] = ( ! empty( $new_instance['imgurl184sq'] ) ) ? $new_instance['imgurl184sq'] : '';
		$instance['name'] = ( ! empty( $new_instance['name'] ) ) ? $new_instance['name'] : '';
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? $new_instance['title'] : '';
		$instance['social1'] = ( ! empty( $new_instance['social1'] ) ) ? $new_instance['social1'] : '';
		$instance['faclass1'] = ( ! empty( $new_instance['faclass1'] ) ) ? $new_instance['faclass1'] : '';
		$instance['social2'] = ( ! empty( $new_instance['social2'] ) ) ? $new_instance['social2'] : '';
		$instance['faclass2'] = ( ! empty( $new_instance['faclass2'] ) ) ? $new_instance['faclass2'] : '';
		$instance['social3'] = ( ! empty( $new_instance['social3'] ) ) ? $new_instance['social3'] : '';
		$instance['faclass3'] = ( ! empty( $new_instance['faclass3'] ) ) ? $new_instance['faclass3'] : '';
		return $instance;
	}
        
}

// Register widget
function register_simple_business_wp_team_content_widget() {
    register_widget( 'simple_business_wp_team_content_widget' );
}
add_action( 'widgets_init', 'register_simple_business_wp_team_content_widget' );



