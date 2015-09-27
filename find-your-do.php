<?php

/**
 * Plugin Name:       Find Your DO
 * Plugin URI:        github
 * Description:       Find Your DO app
 * Version:           0.0.1
 * Author:            pjs
 * Author URI:        https://github.com/pjsinco
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-find-your-do-activator.php
 */
function activate_find_your_do() {
	require_once plugin_dir_path( __FILE__ ) . 
        'includes/class-find-your-do-activator.php';
	Find_Your_Do_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-find-your-do-deactivator.php
 */
function deactivate_find_your_do() {
	require_once plugin_dir_path( __FILE__ ) . 
        'includes/class-find-your-do-deactivator.php';
	Find_Your_Do_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_find_your_do' );
register_deactivation_hook( __FILE__, 'deactivate_find_your_do' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-find-your-do.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_find_your_do() {

	$plugin = new Find_Your_Do();
	$plugin->run();

}
run_find_your_do();
