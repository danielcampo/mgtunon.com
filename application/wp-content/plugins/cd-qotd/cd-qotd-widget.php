<?php
class QotdWidget extends WP_Widget {
	/** constructor */
	function QotdWidget() {
		parent::WP_Widget(false, $name = 'Quote of the day Widget');
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance) {
		extract( $args );

		$title = apply_filters('widget_title', empty( $instance['title'] ) ? 'Quote of the Day' : $instance['title']);

		echo $before_widget . $before_title . $title . $after_title;
		cd_qotd_quote();
		echo $after_widget;
	}

	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance) {
		//Defaults
		$title = esc_attr( $instance['title'] );
	?>
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
	<?php
	}

} // class QotdWidget

// register QotdWidget widget
add_action('widgets_init', create_function('', 'return register_widget("QotdWidget");'));
?>