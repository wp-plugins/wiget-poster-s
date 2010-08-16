<?php
/**
 *Plugin Name: Wiget Poster S
 *Description: Plugin that allow post you widget.
 *Version: 0.3
 *Author: Deer
 *Author URI: mailto:zwooee6@yahoo.com
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
		echo '<div class = "widget_poster_s" id = "'.$this->id.'">';
			if($instance['title'] != ''){
				echo '<div class = "widget_poster_s-title">'.$instance['title'].'</div>';
			}
			if(($instance['text'] != '')||($instance['second_text'] != '')||($instance['third_text'] != '')){
				echo '<div class = "widget_poster_s-textfilds">';
				if ($instance['text'] != '') echo '<div class = "widget_poster_s-textfilds-text">'.$instance['text'].'</div>';
				if ($instance['second_text'] != '') echo '<div class = "widget_poster_s-textfilds-second_text">'.$instance['second_text'].'</div>';
				if ($instance['third_text'] != '') echo '<div class = "widget_poster_s-textfilds-third_text">'.$instance['third_text'].'</div>';
				echo '</div>';
			}
		echo '</div>';
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
