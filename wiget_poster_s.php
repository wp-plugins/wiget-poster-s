<?php
/**
 *Plugin Name: Wiget Poster S
 *Plugin URI: http://res.allnetsoft.ru/wiget-poster-s/
 *Description: Plugin that allow post you wiget.
 *Version: 0.2
 *Author: Deer
 */

/**
 * WIDGETS:
 *
 * widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.
 */
class WigetPosterS_Widget extends WP_Widget {
	function WigetPosterS_Widget() {
		parent::WP_Widget(false, $name = 'Wiget Poster S');
	}

	function widget($args, $instance) {
		extract( $args );
		echo $before_title.$instance['title'].$after_title;
		echo $instance['text'];
		echo $instance['second_text'];
		echo $instance['third_text'];
	}

	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	function form($instance) {
		$title = esc_attr($instance['title']);
		$text = esc_attr($instance['text']);
		$second_text = $instance['second_text'];
		$third_text = $instance['third_text'];

		echo '
		<p><label for="'.$this->get_field_id('title').'"> '._e('Title:').'</label>
		<input class="widefat" id="'.$this->get_field_id('title').'"
		name="'.$this->get_field_name('title').'" type="text"
		value="'.$title.'" /></p>';
		echo '
		<p><label for="'.$this->get_field_id('text').'"> '._e('Main Text:').'</label>
		<input class="widefat" id="'.$this->get_field_id('text').'"
		name="'.$this->get_field_name('text').'" type="text"
		value="'.$text.'" /></p>';
		echo '
		<p><label for="'.$this->get_field_id('second_text').'"> '._e('Second Text:').'</label>
		<input class="widefat" id="'.$this->get_field_id('second_text').'"
		name="'.$this->get_field_name('second_text').'" type="text"
		value="'.$second_text.'" /></p>';
		echo '
		<p><label for="'.$this->get_field_id('third_text').'"> '._e('Third Text:').'</label>
		<input class="widefat" id="'.$this->get_field_id('third_text').'"
		name="'.$this->get_field_name('third_text').'" type="text"
		value="'.$third_text.'" /></p>';
	}

}

/**
 * Register our widget.
 * 'LinksManager_Widget' is the widget class used below.
 */
function WigetPosterS_load_widgets() {
	register_widget( 'WigetPosterS_Widget' );
}

/**
 * Add function to widgets_init that'll load our widget.
 */
add_action('widgets_init', create_function('', 'return register_widget("WigetPosterS_Widget");'));
?>
