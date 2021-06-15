<?php

/**
 * Include widget class(es)
 */
// require(WCMB_PLUGIN_DIR . 'includes/class.BookInfoWidget.php');

/**
 * Register widget(s)
 */
function wcmb_widgets_init() {
	// register_widget('BookInfoWidget');
}
add_action('widgets_init', 'wcmb_widgets_init');
