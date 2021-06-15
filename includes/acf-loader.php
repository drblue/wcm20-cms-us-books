<?php

// Define path and URL to the ACF plugin.
define('WCMB_ACF_PATH', WCMB_PLUGIN_DIR . 'includes/acf/');
define('WCMB_ACF_URL', WCMB_PLUGIN_URL . 'includes/acf/');

// Include the ACF plugin.
include_once(WCMB_ACF_PATH . 'acf.php');

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'wcmb_acf_settings_url');
function wcmb_acf_settings_url($url) {
	return WCMB_ACF_URL;
}

// Change path for Local JSON to point to our plugin
add_filter('acf/settings/save_json', 'wcmb_acf_settings_save_json');
function wcmb_acf_settings_save_json() {
	return WCMB_PLUGIN_DIR . 'includes/acf-json';
}

// (Optional) Hide the ACF admin menu item (false = hide menu, true = show menu)
// add_filter('acf/settings/show_admin', 'wcmb_acf_settings_show_admin');
function wcmb_acf_settings_show_admin($show_admin) {
	return false;  // don't show admin menu item
}
