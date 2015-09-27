<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/pjsinco
 * @since      1.0.0
 *
 * @package    Find_Your_Do
 * @subpackage Find_Your_Do/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Find_Your_Do
 * @subpackage Find_Your_Do/includes
 * @author     pjs <psinco@osteopathic.org>
 */
class Find_Your_Do_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() 
    {
        $post_id = self::fyd_create_results_page();
        self::fyd_update_options($post_id);
	}

    /**
     * Store the post id of the page used to display the search results
     *
     */
    private static function fyd_update_options($post_id)
    {
        update_option('fyd_post_id', $post_id);
    }

    /**
     * Create a new page to display the search results.
     * This page will essentially be the home of the app, 
     * and the one to which we inject all the information 
     * the app displays.
     *
     */
    private static function fyd_create_results_page()
    {
        $date = get_the_date('Y-m-d H:i:s');
        $args = array(
            'post_content' => '',
            'post_title' => 'Find Your DO Results',
            'post_status' => 'publish',
            'post_type' => 'page',
            'ping_status' => 'closed',
            'post_date' => $date,
            'post_date_gmt' => get_gmt_from_date($date),
            'comment_status' => 'closed',
            'page_template' => 'page.php',
        );
    
        $post_id = wp_insert_post($args);
        
        return $post_id;
    }

}