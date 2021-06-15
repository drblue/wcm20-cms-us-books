<?php

if (!function_exists('pre')) {
	/**
	 * Print human-readable information about a variable, wrapped in HTML `<pre>`-tags.
	 *
	 * @param mixed $obj
	 * @return string
	 */
	function pre($obj) {
		return sprintf("<pre>%s</pre>", print_r($obj, true));
	}
}

function wcmb_enqueue_styles() {
	wp_enqueue_style('wcm20-books', WCMB_PLUGIN_URL . "assets/css/wcm20-books.css", [], "0.1", "screen");

	wp_enqueue_script('wcm20-books', WCMB_PLUGIN_URL . "assets/js/wcm20-books.js", [], "0.1", true);
	wp_localize_script('wcm20-books', 'wcmb_settings', [
		'ajax_url' => admin_url('admin-ajax.php'),
		'messages' => [
		],
	]);
}
add_action('wp_enqueue_scripts', 'wcmb_enqueue_styles');

/**
 * Initialize plugin.
 *
 * @return void
 */
function wcmb_plugin_loaded() {
	// Load plugin translations
	load_plugin_textdomain('wcm20-books', false, WCMB_PLUGIN_DIR . 'languages/');
}
add_action('plugins_loaded', 'wcmb_plugin_loaded');


/**
 * Override loading of textdomain for this plugin.
 *
 * @param string $mofile
 * @param string $domain
 * @return string
 */
function wcmb_load_textdomain($mofile, $domain) {
	if ($domain === 'wcm20-books' && strpos($mofile, WP_LANG_DIR . '/plugins/') !== false) {
		$locale = apply_filters('plugin_locale', determine_locale(), $domain);
		$mofile = WCMB_PLUGIN_DIR . 'languages/' . $domain . '-' . $locale . '.mo';
	}
	return $mofile;
}
add_filter('load_textdomain_mofile', 'wcmb_load_textdomain', 10, 2);

/**
 * Filter the content on single book posts.
 *
 * @param string $content
 * @return string
 */
function wcmb_filter_the_content($content) {
	if (get_post_type() === 'wcmb_book' && is_single()) {
		$content .= sprintf('
			<dl class="book-details">
				<dt>ISBN</dt>
				<dd>%s</dd>

				<dt>Pages</dt>
				<dd>%d pages</dd>

				<dt>Genres</dt>
				<dd>%s</dd>
			</dl>',
			get_field('isbn'),
			get_field('pages'),
			get_the_term_list(get_queried_object(), 'wcmb_genre', '', ', ', '')
		);
	}

	return $content;
}
// add_filter('the_content', 'wcmb_filter_the_content');

/**
 * Filter single template to add fallback to plugin template file.
 *
 * @param string $template
 * @param string $type
 * @param string[] $templates
 * @return string
 */
function wcmb_filter_single_template($template, $type, $templates) {
	if (get_post_type(get_queried_object()) === 'wcmb_book') {
		$book_template = locate_template('single-wcmb_book.php');
		if ($book_template !== $template) {
			// neither child nor parent theme had a template file specific for wcmb_book
			// so we'll provide the template file from our plugin
			$template = WCMB_PLUGIN_DIR . 'templates/single-wcmb_book.php';
		}
	}

	return $template;
}
add_filter('single_template', 'wcmb_filter_single_template', 10, 3);
