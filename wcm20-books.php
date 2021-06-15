<?php
/**
 * Plugin Name:	WCM20 Books
 * Description:	This plugin adds a simple book library/database functionality to a site
 * Version:		0.1
 * Author:		Johan Nordström
 * Author URI:	https://www.thehiveresistance.com
 * Text Domain:	wcm20-books
 * Domain Path:	/languages
 */

define('WCMB_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('WCMB_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Include dependencies.
 */
require_once(WCMB_PLUGIN_DIR . 'includes/functions.php');
require_once(WCMB_PLUGIN_DIR . 'includes/widgets.php');
