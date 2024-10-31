<?php

/**
 * The plugin bootstrap file
 *
 * @wordpress-plugin
 * Plugin Name:       Protect My Content
 * Plugin URI:        https://github.com/Sirvelia/protect-my-content/
 * Description:       A simple plugin to protect your content from humans and bots.
 * Version:           1.0.8
 * Author:            Sirvelia
 * Author URI:        https://sirvelia.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       protect-my-content
 * Domain Path:       /languages
 */

if (!defined('WPINC')) {
    die('YOU SHALL NOT PASS!');
}

// PLUGIN CONSTANTS
define('PROTECTMYCONTENT_VERSION', '1.0.8');
define('PROTECTMYCONTENT_PATH', plugin_dir_path(__FILE__));
define('PROTECTMYCONTENT_BASENAME', plugin_basename(__FILE__));
define('PROTECTMYCONTENT_URL', plugin_dir_url(__FILE__));
define('PROTECTMYCONTENT_OPTIONS_GROUP', 'protect_my_content');

// AUTOLOAD
if (file_exists(PROTECTMYCONTENT_PATH . 'vendor/autoload.php')) {
    require_once PROTECTMYCONTENT_PATH . 'vendor/autoload.php';
}

// LYFECYCLE
register_activation_hook(__FILE__, [ProtectMyContent\Includes\Lyfecycle::class, 'activate']);
register_deactivation_hook(__FILE__, [ProtectMyContent\Includes\Lyfecycle::class, 'deactivate']);
register_uninstall_hook(__FILE__, [ProtectMyContent\Includes\Lyfecycle::class, 'uninstall']);

// LOAD ALL FILES
$loader = new ProtectMyContent\Includes\Loader();
