<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://github.com/pjsinco
 * @since      1.0.0
 *
 * @package    Find_Your_Do
 * @subpackage Find_Your_Do/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Find_Your_Do
 * @subpackage Find_Your_Do/includes
 * @author     pjs <psinco@osteopathic.org>
 */
class Find_Your_Do_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() 
    {
        $post_id = self::fyd_get_post_id();

        if ($post_id) {
            wp_delete_post($post_id, true);
            self::fyd_delete_option();
        }
	}

    private static function fyd_delete_option()
    {
        delete_option('fyd_post_id');
    }

    private static function fyd_get_post_id()
    {
        $post_id = get_option('fyd_post_id');
        return $post_id;
    }

}
